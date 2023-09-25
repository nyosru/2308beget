<style>

</style>
<div class="container">

    @if(1==2)
    <div class="row">
        <div class="d-flex bd-highlight mb-3" style="height: 100px">
            <div class="p-2 bd-highlight flex-shrink-1 "
                 style="border: 1px solid green;"
            >Флекс элемент</div>
            <div class="align-self-center w-100 p-2 bd-highlight" style="border: 1px solid green;">Выровненный Флекс
                элемент
            </div>
            {{--            <div class="p-2 bd-highlight" style="border: 1px solid green;">Флекс элемент</div>--}}
        </div>
    </div>
    @endif

    <div class="row">
        <div class="d-flex bd-highlight mb-3"
{{--             xstyle="height: 100px"--}}
        >
            <div class="p-2 bd-highlight flex-shrink-1 d-none d-lg-flex"
{{--                 style="border: 1px solid green;"--}}
            >
                <img src="/storage/domainwaiter/img/waiter.jpg"
                     class="block"
                     style="max-width: 40vh; width:100%; aspect-ratio: auto; margin: 0 auto;"
                />
            </div>
            <div class="align-self-center w-100 p-2 bd-highlight"
{{--                 style="border: 1px solid green;"--}}
            >

                <div class="container-fluid mb-4" style="font-size: 2rem;">
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-2"></div>--}}
                    {{--                        <div class="col-10"></div>--}}
                    {{--                    </div>--}}

                    <div class="row mb-4 mt-4">
                        <div class="col-2 col-md-1"></div>
                        <div class="col-10" style="text-align:left;">
                            <b>Схема работы:</b>
                        </div>
                    </div>

                    <div class="row  mb-4">
                        <div class="col-2 col-md-1">
                            <span class="num bg-gold-round">1</span>
                        </div>
                        <div class="col-10 col-md-11" style="text-align:left;">
                            Добавте домен
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 col-md-1">
                            <span class="num bg-gold-round">2</span>
                        </div>
                        <div class="col-10 col-md-11" style="text-align:left; font-size: 2rem;">
                            Как домен будет доступен для регистрации <span class="alert alert-success p-1">>&nbsp;Пришлём уведомление</span>
                            <br/>
                            <small style="color:gray;">
                                уведомления в телеграм бота (при
                                авторизации, дайте разрешение присылать вам сообщения)
                            </small>
                        </div>
                    </div>


                </div>

            </div>
            {{--            <div class="p-2 bd-highlight" style="border: 1px solid green;">Флекс элемент</div>--}}
        </div>
    </div>

        @if(1==2)
    <div class="row bg1">
        <div class="col-4"><img src="/storage/domainwaiter/img/waiter.jpg"
                                style="max-width: 40vh; width:100%; aspect-ratio: auto; margin: 0 auto;"/></div>
        <div class="col-8">
            <div class="text-left">

                @if(1==2)
                    <h1>Наш товар</h1>
                    <p>Продаём услугу наблюдения за доменами, вы оплачиваете наблюдение и сервис следит за
                        доменом, как только он (домен) становится доступен для регистрации, в боте
                        отправляем вам уведомления об этом!</p>
                @endif

                <div class="container-fluid mb-4" style="font-size: 2rem;">
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-2"></div>--}}
                    {{--                        <div class="col-10"></div>--}}
                    {{--                    </div>--}}

                    <div class="row mb-4 mt-4">
                        <div class="col-1"></div>
                        <div class="col-11" style="text-align:left;">
                            Схема работы:
                        </div>
                    </div>

                    <div class="row  mb-4">
                        <div class="col-1">
                            <span class="num bg-gold-round">1</span>
                        </div>
                        <div class="col-11" style="text-align:left;">
                            Добавте домен
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <span class="num bg-gold-round">2</span>
                        </div>
                        <div class="col-11" style="text-align:left; font-size: 2rem;">
                            Как домен будет доступен для регистрации <span class="alert alert-success p-1">>&nbsp;Пришлём уведомление</span>
                            <br/>
                            <small style="color:gray;">
                                уведомления в бота телеграм (при
                                авторизации, дайте разрешение присылать вам сообщения)
                            </small>
                        </div>
                    </div>


                </div>

                @if(1==2)
                    <p>
                        для просмотра текущего списка доменов, авторизуйтесь!
                        <br/>
                        (через телеграм, ссылка войти на верху)
                        <br/>
                        при авторизации -> разрешите боту присылать вам сообщения, это будут важные напоминания если
                        добавите
                        домены в
                        слежку
                    <p>
                @endif

                <div class="row">
                    <div class="col-8 text-left">

                        <h1>Описание товаров или услуг</h1>

                        <p style="margin-left: 5em;">
                            Предлагаем услуугу: наблюдение за освобождающимися доменами, вы добавляете домены и
                            как только домен
                            становится доступен для регистрации, мы отправляем вам сообщение об этом в телеграм!
                        <p>

                    </div>
                    <div class="col-4"><img src="/storage/domainwaiter/img/domain.png"
                                            style="max-height: 40vh; margin: 0 auto;"/></div>
                </div>

                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <h1>Описание сроков у условий доставки товаров или услуг</h1>
                        <p style="margin-left: 5em;">После оплаты, баланс пополняется сразу!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">


                        <h1>Контактные данные</h1>
                        <p style="margin-left: 5em;">
                            Тел: +7-993-542-22-89 Сергей
                            {{--                    <Br/>--}}
                            {{--                    Тел: +7-922-262-22-89 Сергей--}}
                            <br/>
                            Телеграм: @phpcatcom
                        </p>

                    </div>
                    <div class="col-8">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8">

                        <h1>Информация о компании</h1>
                        <p style="margin-left: 5em;">Адрес: 625006 г.Тюмень ул. Максима Горького 41 - 18
                            <br/>
                            Самозанятый: Бакланов Сергей Сергеевич
                            <br/>
                            ИНН: 720504629150</p>

                    </div>

                </div>

            </div>
@endif
