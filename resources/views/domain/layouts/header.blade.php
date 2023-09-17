<div class="container-fluid" style="background-color: peachpuff;">
    <div class="row">
        <div class="col-12 text-center text-sm py-2">
            {{ __('local.lang_title') }}:&nbsp;
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/go/ru"
                   class="btn btn-sm @if(session('locale') == 'ru' ) btn-info @else btn-outline-info @endif">ru</a>
                <a href="/go/en"
                   class="btn btn-sm  @if(session('locale') == 'en' ) btn-info @else btn-outline-info @endif">en</a>
                {{--            {{ session('locale') }}--}}
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">


        {{--    <div class="container-fluid">--}}

        <a class="navbar-brand" href="/">
            <h2>
            {{ __('local.site_name') }}
            </h2>
        </a>

        {{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"--}}
        {{--            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">--}}
        {{--            <span class="navbar-toggler-icon"></span>--}}
        {{--        </button>--}}

        @if (1 == 1)
            <div class="xcollapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{--                     <li class="nav-item">--}}
                    {{--                        <a class="nav-link active" aria-current="page" href="#">Главная</a>--}}
                    {{--                    </li>--}}

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Ссылка</a>
                    </li> --}}

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Выпадающий список
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Действие</a></li>
                            <li><a class="dropdown-item" href="#">Другое действие</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Отключенная</a>
                    </li> --}}

                </ul>
                {{-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                </form> --}}
                {{-- <button class="button bg-info d-flex">Войти по Телеграм</button> --}}


                {{--                @include('domain.layouts.header.login')--}}
                {{--                @include('domain.layouts.header.login')--}}


                <div class="d-flex">


                    @auth

                        @if(1 ==2)
                            <img src="{{ $user->telegram_photo ?? '' }}" style="width:60px; heigth:60px; float:left;"/>
                            {{ $user->name }}
                            <br/>
                            <a href="{{ route('logout_lk') }}">выйти</a>
                            {{-- <br/>                        111 auth --}}
                            {{-- <br/>                        {{ $user ?? '' }} --}}
                        @endif

                        <div class="text-end pt-2 mr-2">

                            {{--                            Баланс: {{ !empty( $user_info['bonuses']->kolvos ) ? $user_info['bonuses']->kolvos : 0}}--}}
                            {{ __('local.balance_title') }}: {{ $user->bonus }}

                            {{--                            <Br/>                            bonuses {{ $bonuses }}--}}
                            <Br/>
                            <small>
                                <a href="{{ route('cupon.index') }}">{{ __('local.balance_add') }}</a>
                            </small>
                        </div>
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                               id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ $user->telegram_photo ?? 'https://github.com/mdo.png' }}" alt="mdo"
                                     width="32" height="32"
                                     class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                {{--                                <li><a class="dropdown-item" href="#">New project...</a></li>--}}
                                {{--                                <li><a class="dropdown-item" href="#">Settings</a></li>--}}
                                {{--                                <li><a class="dropdown-item" href="#">Profile</a></li>--}}
                                {{--                                <li><hr class="dropdown-divider"></li>--}}
                                <li><a class="dropdown-item"
                                       href="{{ route('domain.logout_lk') }}">{{ __('local.lk_exit') }}</a></li>
                            </ul>
                        </div>

                    @else

                        {{--                        {{ $BOT_USERNAME ?? 'xx' }}--}}

                        <script src="https://telegram.org/js/telegram-widget.js?2"
                                data-telegram-login="{{ $BOT_USERNAME ?? '' }}"
                                data-size="medium" data-auth-url="{{ $REDIRECT_URI ?? '' }}"
                                data-request-access="write"></script>
                        <script type="text/javascript">
                            function onTelegramAuth(user) {
                                alert('Logged 2222 in as ' + user.first_name + ' ' + user.last_name + ' (' + user.id + (user.username ? ', @' + user.username : '') + ')');
                            }
                        </script>
                        {{-- @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif --}}

                    @endguest

                </div>

            </div>
        @endif
    </div>
</nav>
