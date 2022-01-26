<?php

namespace App\Architeture\Checkouts\Interfaces;

use App\Architeture\Checkouts\Models\Checkout;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ICheckoutRepository
{
    /**
     * @return Collection
     */
    public function listAll() : Collection;

    /**
     * @param stdClass $params
     * @return Checkout
     */
    public function addCheckout(stdClass $params) : Checkout;

    /**
     * @param Checkout $id
     * @return Checkout
     */
    public function showCheckout(Checkout $id) : Checkout;
}
