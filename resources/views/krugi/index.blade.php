<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <meta name="csrf-token" value="{{ csrf_token() }}"/>

    {{--    <link rel="stylesheet" href="{{ asset('app.css') }}"/>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>


    @if(1==2)
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
        {{--    <link rel="stylesheet" href="/build/assets/app-15fb0b48.css"/>--}}

        {{--    <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"            type="text/javascript">--}}
        {{--    </script>--}}


        {{--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=07d38e77-67fa-4fe8-9c64-2ec295d03440"--}}
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=d459c05b-ae5a-4168-86ba-15c5487e307c"
                type="text/javascript"></script>
        <script src="/api/photo/mapJs" type="text/javascript"></script>
        {{--<script src="/storage/krugi/site_photo/js1/baloon_html.js" type="text/javascript"></script>--}}
        {{-- <script src="/site_photo/js1/baloon_html.js" type="text/javascript"></script> --}}
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body class="font-sans antialiased">

@if(1==2)
    <div id="map"></div>
    <div id="app"></div>

    <div style="max-height: 100px; overflow: auto;">
<pre>
{{ print_r($cups->toArray(), true) }}
</pre>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12 py-5">

            <h1 class="text-xl"><b>Коллекция кружек для питья горячего сладкого кофе с молоком</b></h1>
            <p>на которой написано название страны или места где получилось ими обзавестись</p>

            <br/>
            <div class="alert alert-warning">
            <p>Как получится прислать кружку от себя, присылайте!</p>
                <br/>
                <p>
                используйте почту россии, получатель по
                номеру телефона 8-922-262-22-89 Сергей (доставят мне прямо в руки)</p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach( $cups as $item )
            {{--    {{ print_r($item) }}--}}
            @include('krugi.item',['item'=>$item])
            {{--    @include('krugi.item')--}}
        @endforeach
    </div>
</div>
</body>

</html>
