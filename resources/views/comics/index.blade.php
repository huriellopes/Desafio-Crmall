@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}" />
@stop

@section('content')
    <div class="row mt-3 comics"></div>
@stop

@section('js')
    <script src="{{ asset('js/comics/index.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@stop
