<div id="map" style="width: 100%; height: 400px;"></div>

<script src="https://api-maps.yandex.ru/2.1/?apikey=d459c05b-ae5a-4168-86ba-15c5487e307c&lang=ru_RU"
        type="text/javascript"></script>

{{--$cups: {{ $cups ?? 'x' }}--}}

<script type="text/javascript">
    ymaps.ready(function() {
        var myMap = new ymaps.Map('map', {
            center: [57.143606, 65.553551], // Центр карты
            zoom: 2
        });

        @foreach ($cups as $c)
        @if( !empty( $c->lat ) && !empty( $c->lon ) )
        // Создаем метку
        var placemark{{ $loop->index }} = new ymaps.Placemark(
            [{{ $c->lon }}, {{ $c->lat }}], {
                balloonContent: '<b>{{ $c->name }}</b>'
            }, {
                preset: 'islands#greenDotIconWithCaption', // Статус маркера
                iconCaption: '{{ $c->name }}'
            });

        // Добавляем метку на карту
        myMap.geoObjects.add(placemark{{ $loop->index }});
        @endif
        @endforeach
    });
</script>
