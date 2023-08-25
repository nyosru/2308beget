@extends('site_ttt.layouts.master')

@section('content')
    {{-- <h1>Hello World</h1>
    <p>
        This view is loaded from module: {!! config('ttt.name') !!}
    </p> --}}
    <div id="app"></div>

    @include('site_ttt.header')

    @include('site_ttt.blockCenter')

    {{-- @include('ttt.backw') --}}

    @include('site_ttt.footer')

@endsection
