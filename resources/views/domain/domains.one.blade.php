<main class="px-3">


    {{--    список доменов--}}

    <div class="container-fluid">
        <div class="row justify-content-center">
            {{--            <div class="col-4">Домены</div>--}}
            <div class="col-12 col-sm-8 col-lg-6">
                <form action="{{ route('domain_add') }}" method="POST">
                    @csrf
                    <input type="text" name="domain" placeholder="домен"/>
                    <button>Добавить</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            {{--            <div class="col-4">Домены</div>--}}
            <div class="col-12 col-sm-8 col-lg-6">

                @if (session('domain_status'))
                    <div class="alert alert-success">
                        {{ session('domain_status') }}
                    </div>
                @endif

                {{-- {{ $domains }} --}}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Домен</th>
                        {{--                        <th>Занят до</th>--}}
                        <th>Статус</th>
                        <th>-</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($domains as $d)
                        <tr class="domain">
                            <td>{{ $d->name }}</td>
                            {{--                            <td>{{ $d->expirationDate }}</td>--}}
                            <td style="font-size: 60%;">
                                @if ( $d->available )
                                    <div class="p-1 bg-success text-white">
                                        можно регистрировать!!
                                    </div>
                                @elseif ( !empty($d->payed_to) )
                                    <div style="background-color: rgba(0,255,0,0.1)" class="p-1 xtext-white">наблюдаем
                                    </div>
                                    {{--                                        @elseif (sizeof($d->pays) > 0)--}}
                                    {{--                                            <div class="p-1 bg-success text-white" >оплачено, наблюдаем</div>--}}
                                @else
                                    Ожидает оплаты <a href="">Оплатить</a>
                                @endif
                            </td>
                            <td>
                                {{--                                        @if ( $d->available )--}}
                                {{--                                        <a href="https://timeweb.com/ru/?i=109721" >хостинг в TimeWeb</a>--}}
                                {{--                                            @endif--}}
                                <a href="#"
                                   title="Удалить домен из активного списка наблюдения"
                                   onclick="return confirm('удалить домен {{ $d->name }} из активного списка ?');"
                                   class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        @if(1==2)
                            <tr>
                                <td colspan="3"><small style="font-size:10px;">{{ str_replace(',',', ',$d) }}</small>
                                </td>
                            </tr>
                        @endif

                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>

<style>
    tr.domain a.remove {
        color: rgba(0, 0, 0, 0.2);
    }

    tr.domain:hover a.remove {
        color: red;
    }
</style>
