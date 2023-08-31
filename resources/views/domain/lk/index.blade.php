@extends('domain.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <h2 class="block">купить наблюдение</h2>

                <style>
                    .tab-rig tr th:nth-child(2),
                    .tab-rig tr td:nth-child(2) {
                        text-align: right;
                    }
                </style>
{{--                {{ $prices }}--}}
                <form action="{{ route('buy.store') }}" method="post">
                    <div style="width:10px; min-width: 250px; margin: 0 auto;">
                        <table class="table table-striped tab-rig text-left">
                            <thead>
                            <tr>
                                <th>Доменов</th>
                                <th>Сумма (р)</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach( $prices as $p )
                                <tr>
                                    <td><label class="block">
                                            <input id="a{{$p->id}}" type="radio" name="price" value="{{$p->id}}"
                                                   @if($p->default) checked @endif />&nbsp;
                                            {{number_format($p->amount_domain,0,'','`') }}
                                        </label></td>
                                    <td>
                                        <label class="block" for="a{{$p->id}}">
                                            {{ number_format($p->amount,0,'','`') }}
                                        </label></td>
                                </tr>
                            @endforeach
                            {{--                            <tr>--}}
                            {{--                                <td><label class="block">--}}
                            {{--                                        <input id=i1 type="radio" name="amount" value="1"/>--}}
                            {{--                                        1--}}
                            {{--                                    </label></td>--}}
                            {{--                                <td>--}}
                            {{--                                    <label class="block" for="i1">--}}
                            {{--                                        150--}}
                            {{--                                    </label></td>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td><label class="block">--}}
                            {{--                                        <input id=i10 type="radio" name="amount" value="10" checked/>--}}
                            {{--                                        10--}}
                            {{--                                    </label></td>--}}
                            {{--                                <td>--}}
                            {{--                                    <label class="block" for="i10">--}}
                            {{--                                        1`000--}}
                            {{--                                    </label></td>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td><label class="block">--}}
                            {{--                                        <input id=i100 type="radio" name="amount" value="1000"/>--}}
                            {{--                                        1`00--}}
                            {{--                                    </label></td>--}}
                            {{--                                <td>--}}
                            {{--                                    <label class="block" for="i100">--}}
                            {{--                                        5`000--}}
                            {{--                                    </label></td>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td><label class="block">--}}
                            {{--                                        <input id=i1000 type="radio" name="amount" value="1000"/>--}}
                            {{--                                        1`000--}}
                            {{--                                    </label></td>--}}
                            {{--                                <td>--}}
                            {{--                                    <label class="block" for="i1000">--}}
                            {{--                                        10`000--}}
                            {{--                                    </label></td>--}}
                            {{--                            </tr>--}}
                            </tbody>
                        </table>
                    </div>

                    {{-- <br/>--}}
                    <br/>
                    Промо код <input type="text" name="promocode" class="p-1 rounded"/>
                    <br/>
                    <br/>
                    <button class="btn btn-success">Оплатить</button>
                </form>
                <br/>
                <br/>
                <img src="/logo/onpay.png" alt="" />
                <br/>
                <br/>
            </div>
            <div class="col-6">
                <h2 class="block">
{{--                    Баланс: {{ $all_cupon ?? 'x' }}--}}
{{--                    <br/>--}}
                    Бонусов: {{ !empty( $bonuses->kolvos ) ? $bonuses->kolvos : 0}}
                </h2>
            </div>
        </div>
    </div>
@endsection
