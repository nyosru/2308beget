@extends('domain.layouts.master')

@section('content')
    <main class="px-3">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="text-center">

            {{--            @auth--}}
            {{--                @include('domain.domains')--}}
            {{--            @else--}}

            {{--            @endauth--}}

            <h1>Напишите сообщение</h1>

            <form action="{{ route('domain_backword_send') }}" method="post">
                @csrf
                <textarea name="text"></textarea>
                <br/>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
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
