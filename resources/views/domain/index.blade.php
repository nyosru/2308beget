@extends('domain.layouts.master')

@section('content')
    <main class="px-3">

        <div class="text-center">

{{--            {{ __('local.site_name') }}<br/>--}}
{{--            {{ __('lll') }}<br/>--}}

            @auth
                @include('domain.domains')
            @else
                <p>
                для просмотра текущего списка доменов, авторизуйтесь!
                <br/>
                (через телеграм, ссылка войти на верху)
                <br/>
                при авторизации -> разрешите боту присылать вам сообщения, это будут важные напоминания если добавите
                домены в
                слежку
                <p>

            <div class="text-left" >

                    <h1>Описание товаров или услуг</h1>

                <p style="margin-left: 5em;" >
                    Предлагаем услуугу: наблюдение за освобождающимися доменами, вы добавляете домены и как только домен
                    становится доступен для регистрации, мы отправляем вам сообщение об этом в телеграм!
                <p>

                <h1>Описание сроков у условий доставки товаров или услуг</h1>
                    <p style="margin-left: 5em;" >После оплаты, баланс пополняется сразу!</p>

                <h1>Контактные данные</h1>
                    <p style="margin-left: 5em;" >
                    Тел: +7-993-542-22-89 Сергей
                    {{--                    <Br/>--}}
                    {{--                    Тел: +7-922-262-22-89 Сергей--}}
                    <br/>
                    Телеграм: @phpcatcom
                </p>

                <h1>Информация о компании</h1>
                    <p style="margin-left: 5em;" >Адрес: 625006 г.Тюмень ул. Максима Горького 41 - 18
                    <br/>
                Самозанятый: Бакланов Сергей Сергеевич
                    <br/>
                ИНН: 720504629150</p>

                </div>

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
