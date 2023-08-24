@extends('job2308.layouts.master')

@section('content')
    <main class="px-3">

{{--        data: {{ print_R($data) }}--}}
<style>
    .up_tr{
        position: sticky;
        top: 0;
        z-index: 11;
        background-color: rgba(255, 255, 255, 0.9);
    }
    .up_tr td{ border-right: 1px solid rgb(50,50,50);}
</style>

<table class="table table-striped" >
    <tr class="up_tr">

        <td>&nbsp;</td>

        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>

        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>

        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>

        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>
        <td>            1111        </td>

        <td>            1111        </td>

    </tr>
    @foreach( $data as $row )
    <tr>
        <td class="p-0"
            style="position: sticky; left: 0;
            z-index: 10;
            background-color: rgba(255,255,255,0.9);"
        >{{ $names[rand(1,sizeof($names)-1)] }}</td>
        @foreach( $row as $col )
{{--            <td>col: {{ print_r($col) }}</td>--}}
            <td class="p-1" style="z-index: 9;">
{{--                @if( $col['type'] == 1 )--}}
{{--                    11 {{ $col['val'] }}--}}
                    @include('job2308.in2norm', $col )
{{--                @elseif( $col['type'] == 1 )--}}
{{--                    @include('job2308.in2norm', $col )--}}
{{--                @else--}}
{{--                    @include('job2308.in3', $col )--}}
{{--                @endif--}}
            </td>
{{--        <td>@include('job2308.in2norm',['val' => '123'])</td>--}}
{{--        <td>@include('job2308.in2norm',['val' => '212'])</td>--}}
{{--        <td>@include('job2308.in2norm',['val' => '123'])</td>--}}
{{--        <td>@include('job2308.in2norm')</td>--}}
{{--        <td>@include('job2308.in2norm')</td>--}}
{{--        <td>@include('job2308.in2warning')</td>--}}
{{--        <td>@include('job2308.in2norm')</td>--}}
{{--        <td>@include('job2308.in2warning')</td>--}}
{{--        <td>@include('job2308.in2norm')</td>--}}
{{--        <td>@include('job2308.in2warning')</td>--}}
{{--        <td>@include('job2308.in2norm')</td>--}}
{{--        <td>данные</td>--}}
        @endforeach
    </tr>
        @endforeach
</table>

    </main>
@endsection
