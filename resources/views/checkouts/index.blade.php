@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}" />
@stop

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h2>List Checkouts</h2>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-striped table-hover datatables" id="checkoutTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Price Total</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/DataTables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/checkouts/index.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@stop
