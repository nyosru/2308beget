<?php

namespace App\Http\Controllers\Krugi;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Service\ServiceImageController;
use App\Models\krugi\Cup;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KrugiController extends Controller
{

    public function mapJs()
    {

        $t = '
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map(\'map\', {
        center: [57.751574, 55.573856],
        zoom: 5,
        controls: []
    }, {
        searchControlProvider: \'yandex#search\'
    });

';

        $nn = 1;
        $e = Cup::all();
        // $e1 = [];
        foreach ($e as $v) {

            if (!empty($v->lat) && !empty($v->lon)) {

                // $n = [
                //     'id' => $v->id,
                //     'name' => $v->name,
                //     'opis' => $v->opis,
                //     'lat' => $v->lat,
                //     'lon' => $v->lon,
                //     // 'img1' => $v->img1 ?? '',

                $t .= '
                // Метка с текстом
                var placemark' . $nn . ' = new ymaps.Placemark([' . $v->lon . ', ' . $v->lat . '], {
                    hintContent: \'' . $v->name . '\',
                }, {
                    \'preset\': \'islands#greenCircleDotIcon\'
                });
                myMap.geoObjects.add(placemark' . $nn . ');
                ';
                $nn++;
            }
        }

        // var placemark = new ymaps.Placemark(
        //     // myMap.getCenter(),
        //     {
        //         // Зададим содержимое заголовка балуна.
        //         balloonContentHeader: '<a href = "#">Рога и копыта</a><br>' +
        //             '<span class="description">Сеть кинотеатров</span>',
        //         // Зададим содержимое основной части балуна.
        //         balloonContentBody: '<img src="img/cinema.jpg" height="150" width="200"> <br/> ' +
        //             '<a href="tel:+7-123-456-78-90">+7 (123) 456-78-90</a><br/>' +
        //             '<b>Ближайшие сеансы</b> <br/> Сеансов нет.',
        //         // Зададим содержимое нижней части балуна.
        //         balloonContentFooter: 'Информация предоставлена:<br/>OOO "Рога и копыта"',
        //         // Зададим содержимое всплывающей подсказки.
        //         hintContent: 'Рога и копыта'
        //     });
        // // Добавим метку на карту.
        // // myMap.geoObjects.add(placemark);
        // // Откроем балун на метке.
        // // placemark.balloon.open();

        $t .= ' } ';

        // return view('site_photo.layouts.app');
        return $t;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $in = [];
        $in['cups'] = Cup::all();
        return view('krugi.index', $in);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $in = [];
        $in['cups'] = Cup::orderBy('name')->get();
        return view('krugi.add', $in);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->s == env('CUPS_PASS_FOR_ADMIN')) {
        } else {
            return redirect()->back()->withSuccess('добавлено no');
        }

        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:jpeg,jpg|max:3048',
            'photo2' => 'mimes:jpeg,jpg|max:3048',
            'photo3' => 'mimes:jpeg,jpg|max:3048',
            'photo4' => 'mimes:jpeg,jpg|max:3048',
            'photo5' => 'mimes:jpeg,jpg|max:3048',
        ]);

        $post = new Cup();
        $post->name = $request->input('name');
//        if ($request->hasFile('photo'))

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file_name = (string)date('ymdhis') . '_cup.jpg';
            $i1 = $request->file('photo')->storeAs('public/krugi/cups', $file_name);

//            $ee = ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name);
//            if (ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name))
//            $ee = ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), basename($i1));
            $ee = ServiceImageController::createMini(storage_path('app/public/krugi/cups' ), basename($i1));
            if ($ee)
                $post->img1 = $file_name;

            dd(
                $ee,
                storage_path('app/public/' . $i1),
                pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME)
            );

        }

//        dd($file_name,$i1);

        if ($request->hasFile('photo2') && $request->file('photo')->isValid()) {
            $file_name = (string)date('ymdhis') . '_cup.jpg';
            $i1 = $request->file('photo2')->storeAs('krugi/cups', $file_name, 'public');
            if (ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name))
                $post->img2 = $file_name;
        }

        if ($request->hasFile('photo3') && $request->file('photo')->isValid()) {
            $file_name = (string)date('ymdhis') . '_cup.jpg';
            $i1 = $request->file('photo3')->storeAs('public/krugi/cups', $file_name);
            if (ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name))
                $post->img3 = $file_name;
        }

        if ($request->hasFile('photo4') && $request->file('photo')->isValid()) {
            $file_name = (string)date('ymdhis') . '_cup.jpg';
            $i1 = $request->file('photo4')->storeAs('public/krugi/cups', $file_name);
            if (ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name))
                $post->img4 = $file_name;
        }

        if ($request->hasFile('photo5') && $request->file('photo')->isValid()) {
            $file_name = (string)date('ymdhis') . '_cup.jpg';
            $i1 = $request->file('photo5')->storeAs('public/krugi/cups', $file_name);
            if (ServiceImageController::createMini(pathinfo(storage_path('app/public/' . $i1), PATHINFO_DIRNAME), $file_name))
                $post->img5 = $file_name;
        }

//        if ($request->hasFile('photo2') && $request->file('photo2')->isValid())
//            $post->img2 = $request->file('photo2')->storeAs('krugi/cups', date('ymdhis') . '_cup2.jpg', 'public');
//        if ($request->hasFile('photo3') && $request->file('photo3')->isValid())
//            $post->img3 = $request->file('photo3')->storeAs('krugi/cups', date('ymdhis') . '_cup3.jpg', 'public');
//        if ($request->hasFile('photo4') && $request->file('photo4')->isValid())
//            $post->img4 = $request->file('photo4')->storeAs('krugi/cups', date('ymdhis') . '_cup4.jpg', 'public');
//        if ($request->hasFile('photo5') && $request->file('photo5')->isValid())
//            $post->img5 = $request->file('photo5')->storeAs('krugi/cups', date('ymdhis') . '_cup5.jpg', 'public');

        $post->save();

//            return redirect('/')->with('success', 'File uploaded successfully');
//        } else {
//            return redirect('/')->with('error', 'Invalid file or file upload failed');
//        }
        return redirect()->back()->withSuccess('добавлено');
//
////        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Cup $cup, Request $r)
    {
        if ($r->s != env('CUPS_PASS_FOR_ADMIN'))
            return redirect()->back()->withSuccess('удалено no');

        $cup->delete();
        return redirect()->back()->withSuccess('удалено');

    }
}
