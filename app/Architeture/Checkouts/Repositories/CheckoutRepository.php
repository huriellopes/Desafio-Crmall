<?php

namespace App\Architeture\Checkouts\Repositories;

use App\Architeture\Checkouts\Interfaces\ICheckoutRepository;
use App\Architeture\Checkouts\Models\Checkout;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class CheckoutRepository implements ICheckoutRepository
{
    /**
     * @return Collection
     */
    public function listAll(): Collection
    {
        return Checkout::all();
    }

    /**
     * @param stdClass $params
     * @return Checkout
     */
    public function addCheckout(stdClass $params): Checkout
    {
        $checkout = new Checkout();
        $checkout->title = $params->title;
        $checkout->quantity = $params->quantity;
        $checkout->price = $params->price;
        $checkout->price_total = $params->price_total;
        $checkout->save();

        return $checkout;
    }

    /**
     * @param Checkout $id
     * @return Checkout
     */
    public function showCheckout(Checkout $id): Checkout
    {
        return $id;
    }
}
