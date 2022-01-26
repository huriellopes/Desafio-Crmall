<?php

namespace App\Architeture\Checkouts\Validates;

use App\Architeture\Validate;

class CheckoutValidate extends Validate
{
    protected $rules = [
        'title' => 'required|string',
        'quantity' => 'required|integer',
        'cupom' => 'required|string',
        'price' => 'required'
    ];

    protected $messages = [];
}
