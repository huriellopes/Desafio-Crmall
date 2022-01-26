<?php

namespace App\Http\Controllers;

use App\Architeture\Checkouts\Interfaces\ICheckoutService;
use App\Architeture\Comics\Interfaces\IWebService;
use App\Traits\Utils;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utils;

    /**
     * @var IWebService
     * @var ICheckoutService
     */
    protected $IWebService;
    protected $ICheckoutService;

    /**
     * @param IWebService $IWebService
     * @param ICheckoutService $ICheckoutService
     */
    public function __construct(IWebService $IWebService, ICheckoutService $ICheckoutService)
    {
        $this->IWebService = $IWebService;
        $this->ICheckoutService = $ICheckoutService;
    }
}
