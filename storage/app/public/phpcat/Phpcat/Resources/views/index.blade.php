@extends('phpcat::layouts.master')

@section('content')
    <div id="app">

        <div class="loader text-center" v-if="1==2"
            style="text-align:center;height: 100vh; padding-top: 20vh;font-family: Tahoma;"">
            <h1 style="font-weight: normal;"><span style="background-color: yellow; padding: 5px;">Норм
                    программирование!!</span>
                <br /><br /><br />
                PHP-CAT
                <br />
                Сергей Бакланов
                <br />
                <br />
                <br />
                позвоните мне 89-222-6-222-89
            </h1>
        </div>

        <div class="container" style="min-height: 80vh;">

            <div class="row">
                <div class="col-12 text-center pt-3 pb-2">
                    <a href="/" style="color:black;text-decoration: none;">
                        <h1 class="p-0 mb-4">php-cat.com</h1>
                    </a>
                </div>
                <div class="col-12 text-center">
                    <app-menu class="p-o m-o xpt-5" />
                </div>
            </div>

            <div class="row" v-if="currentRouteName == 'index'">
                <div class="col-12 col-md-6">
                    <img v-if="1 == 2 " src="/phpcat/ya{{ rand(1, 7) }}.jpg" class="ya pb-5" alt="" />
                    <photos />
                </div>
                <div class="col-12 col-md-6">

                    <h2 class="alert alert-warning text-center">
                        {{ date('Y') }}&nbsp;год самое&nbsp;время реализовать вашу&nbsp;идею!
                    </h2>

                    <p class="text-center">
                        Я&nbsp;Сергей&nbsp;Бакланов
                        <br />
                        <br />
                        Програмист, IT архитектор и IT космонавт )
                        <br />
                        <br />
                        Наиболее активно используемые технологии Laravel + vue3
                        <br />
                        <br />
                        {{-- Набираюсь опыта и учусь быть норм тим/тех&nbsp;лидом, помогать вести группу(ы) IT специалистов --}}
                        {{-- (тестеров, программисты, дизайнеров, верстальщиков), контроль качества и&nbsp;защита --}}
                        {{-- от&nbsp;форс мажоров, --}}
                        {{-- <br /> --}}
                        {{-- <br /> --}}
                        {{-- Команда 3-7 человек было бы самое то, буду признателен если поможете найти такой вид --}}
                        {{-- деятельности --}}
                        {{-- <br /> --}}
                        {{-- <br /> --}}
                        Работаю удалённо, нахожусь&nbsp;в&nbsp;Тюмени
                    </p>

                    <h2 class="alert xalert-info text-center">
                        Позвоните и&nbsp;обсудим
                        <br clear="all" />
                        <small>(или напишите Телеграм/Viber/WA)</small>
                        <br clear="all" />
                        <a href="tel:+79222622289">
                            тел: <b>89-222-6-222-89</b>
                        </a>
                    </h2>
                </div>
            </div>

            <router-view name="content"></router-view>

        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center">
                        <p>© Copyright 2003-{{ date('Y') }} Все права защищены


                        </p>
                    </div>
                    <div class="col-12 col-sm-6 text-center">
                        Создание сайта: <a href="https://php-cat.com" target="_blank">PHP-cat.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>


    </div>
@endsection
