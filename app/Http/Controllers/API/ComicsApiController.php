<?php

namespace App\Http\Controllers\API;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ComicsApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $comics = $this->IWebService->Consult(null);

            return response()->json($comics, 200);
        } catch (\Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }

    /**
     * @param int $comicID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     */
    public function show(int $comicID)
    {
        try {
            $comics = $this->IWebService->Consult($comicID);

            return view('comics.show', compact('comics'));
        } catch (\Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }

    /**
     * @param int $comicID
     * @return JsonResponse
     */
    public function details(int $comicID) : JsonResponse
    {
        try {
            $comics = $this->IWebService->Consult($comicID);

            return response()->json($comics, 200);
        } catch (\Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }
}
