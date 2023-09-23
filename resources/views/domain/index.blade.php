@extends('domain.layouts.master')

@section('content')
    <main class="px-3">

        <div class="text-center">

            {{--            {{ __('local.site_name') }}<br/>--}}
            {{--            {{ __('lll') }}<br/>--}}

            @auth
                @include('domain.domains')
            @else

                @if(session('locale') == 'en')
                    @include( 'domain.index_en')
                @else
                    @include( 'domain.index_ru')
                @endif

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
