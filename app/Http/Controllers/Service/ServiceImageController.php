<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\service\ApiDirResizeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;

class ServiceImageController extends Controller
{


    const R = '/\/(\[width_\d+\])\//';

    /** Определить параметры масшатирования, проверить источник и место назначения
    (создать если не создана папка назначения)
     * @param string $uri Ex.: '/storage/product/[width_100]/2.jpg'
     * @return array|boolean false если не требуется resize или ошибка; массив с
    осн. данными ресайза Ex.: ['outsize'=>'[width_100]', 'type'=>'jpeg',
    'src'=>"/home/andrew/project/shop/public/storage/product/2.jpg",
    'dest'=>"/home/andrew/project/shop/public/storage/product/[width_100]/2.jpg"]
     */
    public static function outsizeArr($uri) {
        // картинка или нет?
        $typeImage = static::imageFileTypeFromExt($uri); // 'png' | false
        if (false === $typeImage) return false;

        //содержит ли команду ресайза?
        $needResize=preg_match(static::R, $uri, $m);//$m=["/[width_100]/", "[width_100]"]
        if (!$needResize) return false;
        $outsize = $m[1]; // '[width_300]'

        // убрать outsize из $url
        $URI = str_replace($m[0], '/', $uri);  // '/storage/product/2.jpg'

        $startsWith = Str::of($URI)->startsWith($storage_uri = '/storage'); // true
        if (!$startsWith) return false;

        $file = static::uriToPath($URI); // '/home/.../public/storage/product/2.jpg'
        if (!file_exists($file)) return false;

        //имя файла
        $name = basename($file); //'2.jpg'

        //путь для файла (без имени)
        $pathToCreate = static::uriToPath(substr($uri, 0,-1*strlen($name)));
        // '/home/.../public/storage/product/[width_100]/2.jpg'

        //создать новый путь для файла если его ещё нет. при неудаче - выйти
        if (
            !file_exists($pathToCreate) && !mkdir($pathToCreate, 0777, true)
        ) return false;

        return [
            'outsize'=>$outsize,
            'type'=>$typeImage,
            'src'=>$file,
            'dest'=>$pathToCreate.$name
        ];
    }

//    /** вычислить mime-тип файла-изображения ('Content-type: image/'...)
//    на основе расширения файла-изображения
//     * @param string Имя файла\URI и т.п. Ex.1: '1.png' Ex.2: '/storage/product/10.jpg'
//     * @return string|boolean тип  Ex.: 'png' или false если файл
//    не из '*.gif', '*.jpeg', '*.jpg', '*.png' */
//    public static function imageFileTypeFromExt($filename) {
//        $ext = strtolower(fileeext($filename));
//        if ($ext==".jpg") $ext = '.jpeg';
//        if (in_array($ext, ['.gif', '.jpeg', '.png'])) return substr($ext, 1);
//        else return false;
//    }

    /**
     * @param string $uri Ex.: '/storage/product/2.jpg'
     * @return string Ex.: '/home/andrew/project/shop/public/storage/product/2.jpg' */
    public static function uriToPath2($uri='') {
        return public_path($uri);
    }

    /** Созд. img на основе имени файла */
    public static function getImage($filename) {
        $img = false;
        //угадываем тип по расширению
//        $type = static::imageFileTypeFromExt($filename);

        $type = 'jpeg';

        switch ($type) {
            case 'png':	$img = @imagecreatefrompng($filename); break;
            case 'gif':	$img = @imagecreatefromgif($filename); break;
            case 'jpeg':$img = @imagecreatefromjpeg($filename);break;
        }

        //не угадали - пробуем всё подряд
        if (false === $img){
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
     * @param resource $im  gd image
//     * @param string $outsize Строка с командой ресайза Ex.: "[width_200]"
     * @param string $new_w Строка с командой ресайза Ex.: "[width_200]"
     * @param string $type Один из типов 'jpeg'|'png'|'gif'
    для указания в "Content-type: image/{$type}"
     * @return boolean|resource False - если ошибка или
    gd image если удалось перемасштабировать */
    public static function imageResize($im, $new_w, $type) {
        $old_w	= imagesx($im);
        $old_h	= imagesy($im);
//        $new_w = $old_w;
        $new_h = $old_h;

//        if (preg_match('/\[.*_(.+)\]/', $outsize, $m)) {
//            // "[width_200]" => $m = ["[width_200]", '200']
//            $new_w = intval($m[1]);
            $new_h = round(($new_w/$old_w) * $old_h); // k*old_h - расчёт нов. высоты
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
     * @param $dir папка
     * @param $filename файл оригинал
     * @return bool
     */
    static public function createMini($dir, $filename)
    {

//        echo '<br/>'.__FUNCTION__.'<Br/># '.__LINE__.'<br/><br/>';

        $img = self::getImage($dir.'/'. $filename);
        if($img)
        $img_mini = self::imageResize( $img, 400,'jpg');
        imagejpeg($img_mini, $dir.'/mini/'. $filename );

    }




    function resizeImage($type, $size, $img)
    {

        Image::make($main_picture->getRealPath())->resize(245, 245,
            function ($constraint) {
                $constraint->aspectRatio();
            })
            ->resizeCanvas(245, 245)
            ->save('images/articles/' . $gender . '/thumbnails/245x245/' . $picture_name, 80);

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

        $validated = $request->validate([
                'dir' => 'bail|required|string',
                'width' => 'integer',
            ]
        );

        $dir_img = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public/' . $validated['dir'];
        // ищем что нужно создать в мини
        $no_mini = self::findNoMini($dir_img);

        $rebrush = [];

        $count = 1;
        foreach ($no_mini as $f) {

            if ($count == 100)
                break;

//            $rebrush[] = $f;
            $rebrush[] = self::createMini($dir_img,$f);

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

    function showResizeImage($type, $size, $img)
    {
        dd([$type, $size, $img]);
    }

    function resizeImage2()
    {
        ob_start();
        switch ($type) {
            case 'gif':
                imagegif($im);
                imagegif($im, $a['dest']);
                break;
            case 'png':
                imagepng($im);
                imagepng($im, $a['dest']);
                break;
            default:
                imagejpeg($im);
                imagejpeg($im, $a['dest']);
        }
        $buffer = ob_get_contents();
        ob_end_clean();
        imagedestroy($im);
        return response($buffer, 200)->header('Content-type', 'image/' . $type);
    }
}
