@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}" />
@stop

@section('content')
    <div class="row">
        <div class="col">
            <h2>Checkout Sale</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="" method="POST" id="CheckoutSale">
                <div class="row">
                    <div class="col form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" readonly />
                    </div>
                    <div class="col form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" readonly />
                    </div>
                    <div class="col form-group">
                        <label for="cupom">Cupom</label>
                        <input type="text" name="cupom" class="form-control" id="cupom" />
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-3 form-group">
                        <input type="text" name="price_total" class="form-control" id="price_total" disabled />
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col form-group">
                        <button type="submit" class="btn btn-success">Checkout finish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/checkouts/index.js') }}"></script>
@stop
