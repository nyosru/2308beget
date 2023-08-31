<footer class="mt-auto pt-5 text-white-50 text-center" style="background-color:rgba(0,0,0,0.2);">
    {{-- <p>Шаблон обложки для <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, от <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p> --}}
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 p-1">
                &copy; 2020-{{ date('Y') }}
            </div>
            <div class="col-12 col-md-6 p-1">
                <a href="{{ route('domain_backword') }}">Обратная связь</a>
            </div>
        </div>
    </div>

</footer>
<a href="https://php-cat.com" style="display: block; position:fixed; right:10px; bottom: 40px;">Создание сайта
    php-cat.com</a>
