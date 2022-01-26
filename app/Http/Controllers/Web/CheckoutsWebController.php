<?php

namespace App\Http\Controllers\Web;

use App\Architeture\Checkouts\Models\Checkout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutsWebController extends Controller
{
    /**
     * @var string
     */
    protected $ViewPath = 'checkouts.';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view($this->ViewPath.'index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create (Request $request)
    {
        dump($request->all());
        return view($this->ViewPath.'create');
    }

    /**
     * @param Checkout $id
     */
    public function show(Checkout $id)
    {
        //
    }
}
