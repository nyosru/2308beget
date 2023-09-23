<main class="px-3">


    {{--    список доменов--}}

    <div class="container-fluid">

        <div class="row justify-content-center">
            {{--            <div class="col-4">Домены</div>--}}
            <div class="col-12 col-sm-8 col-lg-6">
                <form action="{{ route('domain.domain_add') }}" method="POST">
                    @csrf
                    <input type="text" name="domain" placeholder="{{ __('local.form_add__input__placeholder') }}"/>
                    <button>{{ __('local.form_add_button_add_tittle') }}</button>
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

                @if (session('domain_warning'))
                    <div class="alert alert-warning">
                        {{ session('domain_warning') }}
                    </div>
                @endif

                @if (session('button_buy'))
                    <div class="alert alert-success">


                        {{--                        <button class="btn btn-info">Оплатить</button>--}}

                        {{--                        <button class="btn btn-info">Купоном с Баланса</button>--}}

                        {{--                        {{ session('domain_status') }}--}}

                        {{--                        {{ session('domain') }}--}}

                        {{--                        @if( !empty( $user_info['bonuses']->kolvos ) && $user_info['bonuses']->kolvos > 0 )--}}
                        $user->bonus: {{ $user->bonus }}
                        <br/>

                        @if( $user->bonus > 0 )
                            <a class="btn btn-success"
                               href="{{ route('domain_api.domainNameBuyBonus',['domain_name' => session('domain') ]) }}">
                                {{ __('local.list_domains__button_buy_bonuses__title') }}
                            </a>
                        @endif

                    </div>
                @endif

                {{-- {{ $domains }} --}}
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('local.list_domains__table_header_domain') }}</th>
                        {{--                        <th>Занят до</th>--}}
                        <th>{{ __('local.list_domains__table_header_status') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($domains as $d)

                        @include('domain.domains_item',['d' => $d ])

                        @if(1==2)
                        {{--                        @include('domain.domains.one')--}}

                        <tr class="domain">
                            <td>
                                {{ $d->name }}
                            </td>
                            {{--                            <td>{{ $d->expirationDate }}</td>--}}
                            <td style="font-size: 60%;">
                                @if ( $d->available )
                                    <div class="p-1 bg-success text-white">
                                        {{ __('local.list_domains__domain__mogno_regit') }}
                                    </div>
                                @elseif ( !empty($d->payed_do) )
                                    <div style="background-color: rgba(0,255,0,0.1)" class="p-1 xtext-white">
                                        {{ __('local.list_domains__domain__nabludaem') }}
                                    </div>

                                    {{--                                    @if( !empty($d->expirationDate) )--}}
                                    {{--                                        <div style="background-color: rgba(255,55,55,0.2)" class="p-1 text-black">--}}
                                    {{--                                            Занят до: {{ $d->expirationDate }}--}}
                                    {{--                                        </div>--}}
                                    {{--                                    @elseif( !empty($d->whois[0]->expirationDate) )--}}



                                    @if( !empty($d->whois[0]->expirationDate) || !empty($d->whois2[0]->expirationDate) )
                                        <div style="background-color: rgba(255,55,55,0.2)" class="p-1 text-black">
                                            {{ __('local.list_domains__domain__zanyat_do',['date' => $d->whois2[0]->expirationDate ?? $d->whois[0]->expirationDate ?? '']) }}:
                                        </div>
                                    @elseif( !empty($d->expirationDate) )
                                        {{--                                    @if( !empty($d->expirationDate) )--}}
                                        <div style="background-color: rgba(255,55,55,0.2)" class="p-1 text-black">
                                            {{ __('local.list_domains__domain__zanyat_do') }}: {{ $d->expirationDate }}
                                        </div>
                                    @elseif($d->last_scan != null)
                                        <div style="background-color: rgba(0,255,0,0.1)" class="p-1 xtext-white">
                                            {{ __('local.list_domains__domain__provereno') }}
                                            : {{  Carbon\Carbon::parse($d->last_scan)->format('d.m.Y') }}c
                                            @endif

                                            {{--                                        @elseif (sizeof($d->pays) > 0)--}}
                                            {{--                                            <div class="p-1 bg-success text-white" >оплачено, наблюдаем</div>--}}
                                            @else
                                                {{ __('local.list_domains__domain__ogidaet_oplatu') }}
                                                {{--                                    <a href="">Оплатить</a>--}}
                                                {{--                                                <br/>--}}
                                                @if( $user->bonus > 0 )
                                                    {{--                                                    {{$user->bonus }}--}}
                                                    <br/>
                                                    <a href="{{ route('domainBuyBonus',['domain' => $d]) }}"
                                                       onclick="return confirm('{{ __('local.list_domains__domain__oplatit_bonusom__podtv') }} {{ $d->name }} ?')"
                                                    >{{ __('local.list_domains__domain__oplatit_bonusom') }}</a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                {{--                                        @if ( $d->available )--}}
                                {{--                                        <a href="https://timeweb.com/ru/?i=109721" >хостинг в TimeWeb</a>--}}
                                {{--                                            @endif--}}
                                {{--                                {{ route('domain_deactive',['id'=>$d->id]) }}--}}

                                <a href="{{ route('domain_deactive',['domain'=>$d]) }}"
                                   title="Удалить домен из активного списка наблюдения"
                                   onclick="return confirm('{{ __('local.list_domains__domain__udalit_domen',['domain' => $d->name]) }}');"
                                   class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                        @if(1==1)
                            <tr>
                                <td colspan="3"><small style="font-size:10px;">{{ str_replace(',',', ',$d) }}</small>
                                </td>
                            </tr>
                        @endif
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
