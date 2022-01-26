<?php

namespace App\Architeture\Checkouts\Services;

use App\Architeture\Checkouts\Interfaces\ICheckoutRepository;
use App\Architeture\Checkouts\Interfaces\ICheckoutService;
use App\Architeture\Checkouts\Models\Checkout;
use App\Architeture\Checkouts\Validates\CheckoutValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class CheckoutService implements ICheckoutService
{
    /**
     * @var ICheckoutRepository
     * @var CheckoutValidate
     */
    protected $ICheckoutRepository;
    protected $CheckoutValidate;

    /**
     * @param ICheckoutRepository $ICheckoutRepository
     * @param CheckoutValidate $CheckoutValidate
     */
    public function __construct(ICheckoutRepository $ICheckoutRepository, CheckoutValidate $CheckoutValidate)
    {
        $this->ICheckoutRepository = $ICheckoutRepository;
        $this->CheckoutValidate = $CheckoutValidate;
    }

    /**
     * @return Collection
     */
    public function listAll(): Collection
    {
        return $this->ICheckoutRepository->listAll();
    }

    /**
     * @param stdClass $params
     * @return Checkout
     * @throws \Throwable
     */
    public function addCheckout(stdClass $params): Checkout
    {
        $this->CheckoutValidate->validaParametros($params);
        return $this->ICheckoutRepository->addCheckout($params);
    }

    /**
     * @param Checkout $id
     * @return Checkout
     * @throws \App\Exceptions\SystemException
     */
    public function showCheckout(Checkout $id): Checkout
    {
        $this->CheckoutValidate->validateInt((int) $id);
        return $this->ICheckoutRepository->showCheckout($id);
    }

    /**
     * @return CheckoutValidate
     */
    private function getCheckoutValidate() : CheckoutValidate
    {
        return $this->CheckoutValidate;
    }
}
