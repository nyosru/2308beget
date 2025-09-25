<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1"/>
    <link rel="shortcut icon" href="/storage/krugi/favicon.png" type="image/png"/>
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>--}}
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    {{--    <link rel="stylesheet" href="{{ asset('app.css') }}"/>--}}
        <link rel="stylesheet" href="/css/output.css?v12"/>
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>--}}
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}

{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
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

    @if(1==1)

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
{{--            <link rel="stylesheet" href="/build/assets/app-15fb0b48.css"/>--}}

            <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"            type="text/javascript">
            </script>

        {{--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=07d38e77-67fa-4fe8-9c64-2ec295d03440"--}}
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=d459c05b-ae5a-4168-86ba-15c5487e307c"
                type="text/javascript"></script>
        <script src="/api/photo/mapJs" type="text/javascript"></script>
        {{--<script src="/storage/krugi/site_photo/js1/baloon_html.js" type="text/javascript"></script>--}}
        {{-- <script src="/site_photo/js1/baloon_html.js" type="text/javascript"></script> --}}
    @endif

    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
    {{--          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}


    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://xn--f1aeeb2as.xn--90adfbu3bff.xn--p1ai">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Коллекция кружек для питья горячего сладкого кофе!">
    <meta property="og:description" content="коллекция Сергея Бакланова программиста, от себя и моих друзей!">

    <meta property="og:image" content="https://php-cat.com/cups/preview_link_cups_for_fb.jpg">

    <!-- VK Meta Tags -->
    <meta property="vk:image"  content="https://php-cat.com/cups/preview_link_cups_for_vk.jpg" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="кружки.СергейСБ.рф">
    <meta property="twitter:url" content="https://xn--f1aeeb2as.xn--90adfbu3bff.xn--p1ai">
    <meta name="twitter:title" content="Коллекция кружек для питья горячего сладкого кофе!">
    <meta name="twitter:description" content="коллекция Сергея Бакланова программиста, от себя и моих друзей!">
    <meta name="twitter:image" content="https://php-cat.com/cups/preview_link_cups_for_vk.jpg">



    @livewireStyles

</head>
<body class="font-sans antialiased"
style="background: linear-gradient(135deg, #e0e0e0, #f3f3f3);">


<div class="p-2
{{--bg-gray-200 --}}
rounded-lg shadow-md" style="z-index:10;
position: fixed; bottom: 20px; right: 20px;
padding: 10px 20px;
text-align:center;
/*box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);*/
 background: linear-gradient(135deg, #ffffff, #fffbef);
 border: 1px solid #ccc;

">
{{--    Создание--}}
{{--    сайта <a href="https://php-cat.com" class="underline" target="_blank">php-cat.com</a>--}}
    <div class="flex flex-row items-center justify-center">
        <div>
            <a href="https://php-cat.com"
               class="whitespace-nowrap text-blue-600 hover:underline"
               target="_blank">
                <img src="https://php-cat.com/phpcat/cat.png" style="max-height: 60px;" class="inline-block "/>
            </a>
        </div>
        <div>
            Создание сайта<br/>
            <a href="https://php-cat.com"
               class="whitespace-nowrap text-blue-600 hover:underline"
               target="_blank"
            style="color: blue; "
            >
                &nbsp;php-cat.com
            </a>
        </div>
    </div>

</div>

<div class="container-fluid mx-auto">
    <div class="w-full mt-10 text-center mb-5">
        <h1 class="text-xl"><b>Коллекция кружек для питья горячего, сладкого кофе с молоком</b></h1>
        <p>на которой написано название страны, города или места где получилось ей обзавестись, купить, получить</p>

        <br/>
        <div class="bg-yellow-200 p-5 inline-block" style="border-radius: 10px;">
            <p>Как получится прислать кружку, присылайте!</p>
            <p>
<b>                используйте почту россии,</b><br/>
                625062 г.Тюмень, ул. Революции 208а, кв 1<br/>
                Сергей Бакланов 8-922-262-22-89</p>
        </div>
    </div>

    <livewire:cup.index />


</div>
<br/>
<br/>
<br/>
<br/>
<br/>

@livewireScripts

{{--<!-- Yandex.Metrika counter -->--}}
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        for (var j = 0; j < document.scripts.length; j++) {
            if (document.scripts[j].src === r) {
                return;
            }
        }
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(96033624, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/96033624" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
{{--<!-- /Yandex.Metrika counter -->--}}
</body>
</html>
