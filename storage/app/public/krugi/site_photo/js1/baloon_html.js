ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
        center: [62.751574, 27.573856],
        zoom: 3,
        controls: []
    }, {
        searchControlProvider: 'yandex#search'
    });



    // Метка с текстом
    var placemark3 = new ymaps.Placemark([55.85616623000242, 37.429322469480205], {
        hintContent: 'Метка 3',
        // iconContent: 'Метка 3'
    }, {
        // 'preset': 'islands#yellowStretchyIcon'
        'preset': 'islands#greenCircleDotIcon'
    });
    myMap.geoObjects.add(placemark3);




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
}