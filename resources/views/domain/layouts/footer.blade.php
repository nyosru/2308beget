<footer class="mt-auto p-1 text-black-50" style="background-color:rgba(0,0,0,0.2);">
    {{-- <p>Шаблон обложки для <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, от <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> --}}
    <div class="container">
        <div class="row">
            <div class="col-4">
                Тел: +7-993-542-22-89 Сергей
                <br/>
                Телеграм: @phpcatcom
                <br/>
                Адрес: 625006 г.Тюмень ул. Максима Горького 41 - 18
                <br/>
                Самозанятый: Бакланов Сергей Сергеевич
                <br/>
                ИНН: 720504629150
                <br/>
            </div>
            <div class="col-4"></div>
            <div class="col-4">

            </div>
            </div>
        <div class="row">
            <div class="col-12 col-md-6 p-1 text-center">
                &copy; 2020-{{ date('Y') }}
            </div>
            <div class="col-12 col-md-6 p-1 text-center">
                <a href="{{ route('domain_backword') }}">{{ __('local.site_backword_title') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <small>
                <a href="https://php-cat.com" target="_blank">{{ __('local.created_site') }}
                    php-cat.com</a>
                </small>
            </div>
        </div>
    </div>

</footer>
