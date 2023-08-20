@extends('domain.layouts.master')

@section('content')
    <main class="px-3">

        <div class="text-center">

            @auth
                @include('domain.domains')
            @else
                для просмотра текущего списка доменов, авторизуйтесь!
                <br />
                (через телеграм, ссылка войти на верху)
                <br />
                при авторизации -> разрешите боту присылать вам сообщения, это будут важные напоминания если добавите домены в
                слежку
            @endauth

            {{-- <h1>Быстрый доступ к документам</h1> --}}
            {{-- <p class="lead">Секретный доступный метод хранения и показа документов.</p> --}}
            {{-- <p class="lead">Войти в свои документы: </p> --}}

            {{-- <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Узнать больше</a>
    </p> --}}

        </div>
    </main>

    {{-- <h1>Hello World</h1>
    <p>
        This view is loaded from module: {!! config('ttt.name') !!}
    </p> --}}
    {{-- <div id="app"></div> --}}

    {{-- @include('ttt.header') --}}
    {{-- @include('ttt.blockCenter') --}}

    {{-- @include('ttt.backw') --}}

    {{-- @include('ttt.footer') --}}
@endsection
