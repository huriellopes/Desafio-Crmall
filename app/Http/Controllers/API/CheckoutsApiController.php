<?php

namespace App\Http\Controllers\API;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkouts\CheckoutFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;
use Exception;

class CheckoutsApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $checkouts = $this->ICheckoutService->listAll();

            return response()->json($checkouts, 200);
        } catch (Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }

    /**
     * @param CheckoutFormRequest $request
     * @return JsonResponse|void
     */
    public function store(CheckoutFormRequest $request)
    {
        try {
            $params = new stdClass();
            $params->title = $this->limpa_tags($request->input('title'));
            $params->quantity = $this->limpa_tags($request->input('quantity'));
            $params->price = $this->limpa_tags($request->input('price'));
            $params->price_total = $this->limpa_tags($request->input('price_total'));

            $this->ICheckoutService->addCheckout($params);

            return response()->json([
                'message' => 'Checkout realizado com sucesso!'
            ], 201);

        } catch (Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
