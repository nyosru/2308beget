<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">Сервис ожидания освобожденя доменов</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (1 == 1)
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    </li> --}}

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


                <div class="d-flex">
                    <script src="https://telegram.org/js/telegram-widget.js?2" data-telegram-login="{{ $BOT_USERNAME }}" data-size="medium"
                        data-auth-url="{{ $REDIRECT_URI }}" data-request-access="write"></script>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        111 auth
                        {{ $user }}
                    @else
                        @guest
                            222 quest
                        @else
                            2200 not guest
                        @endguest
                    @endauth

                </div>

            </div>
        @endif
    </div>
</nav>
