<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Школа бильярда Александра Коновалова ттт72.рф Тюмень</title>

    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/ttt.css') }}"> --}}

    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('js/app.css') }}?{{ rand() }}"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    {{-- @vite('resource/js/app.js') --}}
    {{-- @vite('js/app.js') --}}
    @vite('resources/css/app.css')
    {{-- @vite() --}}
</head>

<body>

    @yield('content')
    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/ttt.js') }}"></script> --}}

</body>
{{-- <script src="{{ asset('ttt/app.js') }}?271220222210"></script> --}}
{{-- {{ asset('ttt/app.js') }}?{{ rand() }} --}}
{{-- <script src="{{ asset('js/app.js') }}?{{ rand() }}"></script> --}}
{{-- <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script> --}}
<script
  type="text/javascript"
  src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</html>
