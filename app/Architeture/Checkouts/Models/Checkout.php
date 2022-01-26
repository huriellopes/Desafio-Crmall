<?php

namespace App\Architeture\Checkouts\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'quantity',
        'cupom',
        'price',
        'price_total'
    ];
}
