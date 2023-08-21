<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        {{--    <div class="container-fluid">--}}

        <a class="navbar-brand" href="/">Сервис ожидания освобожденя доменов</a>

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
                            Баланс: 0
                            <Br/>
                            <small>
                                <a href="{{ route('cupon.index') }}">Пополнить</a>
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
                                <li><a class="dropdown-item" href="{{ route('logout_lk') }}">Выйти</a></li>
                            </ul>
                        </div>

                    @else

                        {{ $BOT_USERNAME ?? 'xx' }}

                        <script src="https://telegram.org/js/telegram-widget.js?2"
                                data-telegram-login="{{ $BOT_USERNAME ?? '' }}"
                                data-size="medium" data-auth-url="{{ $REDIRECT_URI ?? '' }}"
                                data-request-access="write"></script>

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
