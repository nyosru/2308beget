@extends('job2308.layouts.master')

@section('content')
    <main class="px-3">

{{--        data: {{ print_R($data) }}--}}

<table class="table" >
    <tr>

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
        <td class="p-0">{{ $names[rand(1,sizeof($names)-1)] }}</td>
        @foreach( $row as $col )
{{--            <td>col: {{ print_r($col) }}</td>--}}
            <td class="p-1">
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
