<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Программирование сайтов PHP-cat.com</title>
    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/phpcat.css') }}"> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('phpcat3/css.css') }}?{{ rand() }}">
</head>

<body>
    @yield('content')
</body>
{{-- Laravel Mix - JS File --}}
{{-- <script src="{{ mix('phpcat/app.xxx-js') }}"></script> --}}
{{-- <script src="{{ mix('phpcat/app.xxx-js') }}"></script> --}}
<script src="{{ asset('phpcat7/app.xxx-js') }}?{{ rand() }}"></script>
{{ asset('phpcat7/app.xxx-js') }}?{{ rand() }}
{{-- <script src="{{ asset('Modules/phpcat/public/phpcat77/xxx-js.xxx-js') }}"></script> --}}

</html>
