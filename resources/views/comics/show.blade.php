@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}" />
@stop

@section('content')
    <div class="row mt-3 comics-show"></div>
@stop

@section('js')
    <script>
        @foreach ($comics['data']['results'] as $comic)
            id = {{ $comic['id'] }}
        @endforeach
    </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/comics/show.js') }}"></script>
@stop
