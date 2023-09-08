<?php

namespace App\Http\Controllers\Krugi;

use App\Http\Controllers\Controller;

use App\Models\krugi\Cup;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
