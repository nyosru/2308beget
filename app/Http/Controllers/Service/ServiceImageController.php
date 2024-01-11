<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\service\ApiDirResizeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;

class ServiceImageController extends Controller
{


    const R = '/\/(\[width_\d+\])\//';

    /** Созд. img на основе имени файла */
    public static function getImage($filename)
    {
        $img = false;
        //угадываем тип по расширению
//        $type = static::imageFileTypeFromExt($filename);

        $type = 'jpeg';

        switch ($type) {
            case 'png':
                $img = @imagecreatefrompng($filename);
                break;
            case 'gif':
                $img = @imagecreatefromgif($filename);
                break;
            case 'jpeg':
                $img = @imagecreatefromjpeg($filename);

                if (!$img) {
                    $error = error_get_last();
//                    echo "Ошибка: " . $error['message'];
                    var_dump($error);
                }

                break;
        }

        //не угадали - пробуем всё подряд
        if (false === $img) {
            $img = @imagecreatefromgif($filename);
            if (false !== $img) return $img;
            $img = @imagecreatefrompng($filename);
            if (false !== $img) return $img;
            $img = @imagecreatefromjpeg($filename);
            if (false !== $img) return $img;
        }

        //если ничего не удалось - вернуть false
        return $img;
    }

    /** Ресайз изображений с сохранением пропорций
     * @param resource $im gd image
     * //     * @param string $outsize Строка с командой ресайза Ex.: "[width_200]"
     * @param string $new_w Строка с командой ресайза Ex.: "[width_200]"
     * @param string $type Один из типов 'jpeg'|'png'|'gif'
     * для указания в "Content-type: image/{$type}"
     * @return boolean|resource False - если ошибка или
     * gd image если удалось перемасштабировать */
    public static function imageResize($im, $new_w, $type)
    {
        $old_w = imagesx($im);
        $old_h = imagesy($im);
//        $new_w = $old_w;
        $new_h = $old_h;

//        if (preg_match('/\[.*_(.+)\]/', $outsize, $m)) {
//            // "[width_200]" => $m = ["[width_200]", '200']
//            $new_w = intval($m[1]);
        $new_h = round(($new_w / $old_w) * $old_h); // k*old_h - расчёт нов. высоты
//        }

        //создание нового изображения с новыми размерами (его и будем возвращать)
        $image = imagecreatetruecolor($new_w, $new_h);

        // подготовка альфа-канала (для форматов поддерживающих прозрачность)
        if (in_array($type, ['png', 'gif'])) {
            imagesavealpha($image, true);
            $trans_colour = imagecolorallocatealpha($image, 0, 0, 0, 127);
            imagefilledrectangle(
                $image, 0, 0, imagesx($image), imagesy($image), $trans_colour
            );
            imagealphablending($image, false);
        }

        // собственно масштабирование (копирование с растягиванием\сжатием картинки)
        // и убивание более ненужного исходника
        if (imagecopyresampled($image, $im, 0, 0, 0, 0, $new_w, $new_h, $old_w, $old_h)) {
            imagedestroy($im);
        } else {
            Log::warning('[ScaledImage404Controller]::imageResize Picture not copied');
            imagedestroy($image);
            $image = $im;
        }

        return $image;
    }

    /**
     * создаёт мини изображение
     * @param $dir string папка
     * @param $filename string файл оригинал
     * @return bool
     */
    static public function createMini($dir, $filename): string|bool
    {
//        Log::debug($dir.' ' . $filename);

        if (file_exists($dir . '/' . $filename)) {

            echo __LINE__ . ' ' . PHP_EOL;
            echo $dir . '/' . $filename . ' ' . PHP_EOL;

//            Log::debug('файл есть #'.__LINE__);
//            dd('file_e');

            $img = self::getImage($dir . '/' . $filename);

            if ($img) {
                echo __LINE__ . ' ';
//                Log::debug('файл есть2 #'.__LINE__);
                $img_mini = self::imageResize($img, 400, 'jpg');
                $new_file = $dir . '/mini/' . $filename;
                imagejpeg($img_mini, $new_file);
//                dd($img_mini, $new_file);
//                Log::debug('новый файл '.$new_file.' #'.__LINE__);
                return $new_file;
            }
        } else {
//            Log::debug('файл НЕТ #'.__LINE__);
//            dd('file_no e');
        }
        return false;
    }

    /**
     * @param string $uri Ex.: '/storage/product/2.jpg'
     * @return string Ex.: '/home/andrew/project/shop/public/storage/product/2.jpg'
     */
    public static function uriToPath($uri = '')
    {
        return public_path($uri);
    }

    function resizeDir(ApiDirResizeRequest $request): JsonResponse
    {

        $dir_img = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public/' . $request->dir;
        // ищем что нужно создать в мини
        $no_mini = self::findNoMini($dir_img);

        $rebrush = [];

        $count = 1;
        foreach ($no_mini as $f) {

            if ($count == 100)
                break;

            $rebrush[] = self::createMini($dir_img, $f);

            $count++;
        }

        return response()->json([
            'rebrush' => $rebrush,
//            '$no_mini' => $no_mini
            '$no_mini' => count($no_mini)
//            'list' => $list,
//            'list_mini' => $list_mini
        ]);

    }


    /**
     * смотрит есть или нет файл в папке базовой и мини
     * возвращает список файлов что есть в базовой и нет в мини
     *
     * @param $dir
     * @return array
     */
    static public function findNoMini($dir): array
    {
        $list = [];

        $list = scandir($dir);
        $dir_mini = $dir . DIRECTORY_SEPARATOR . 'mini';

        if (!is_dir($dir_mini))
            mkdir($dir_mini, 0755);

        $list_mini = scandir($dir_mini);
//        dd($list_mini);
        $list_no_mini = [];

        foreach ($list as $f) {
            if ($f != '.' && $f != '..' && is_file($dir . DIRECTORY_SEPARATOR . $f)) {
                $e = in_array($f, $list_mini);
                if (!$e) {
                    $list_no_mini[] = $f;
//                    $list2[] = $e;
                }
            }
        }

        return $list_no_mini;
    }

    public function resizeImageComon($image, $requiredSize)
    {
        $width = $image->width();
        $height = $image->height();

        // Check if image resize is required or not
        if ($requiredSize >= $width && $requiredSize >= $height) return $image;

//        $newWidth = ;
//        $newHeight;

        $aspectRatio = $width / $height;
        if ($aspectRatio >= 1.0) {
            $newWidth = $requiredSize;
            $newHeight = $requiredSize / $aspectRatio;
        } else {
            $newWidth = $requiredSize * $aspectRatio;
            $newHeight = $requiredSize;
        }

        $image->resize($newWidth, $newHeight);
        return $image;
    }

}
