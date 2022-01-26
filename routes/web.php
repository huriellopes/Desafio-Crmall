<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Web\ComicsWebController;
use App\Http\Controllers\Web\CheckoutsWebController;
use App\Http\Controllers\Api\ComicsApiController;
use App\Http\Controllers\Api\CheckoutsApiController;

// Redirect route url to */comics*
Route::redirect('/', '/comics');

Route::group(['prefix' => '/comics'], function () {
    Route::get('/', [ComicsWebController::class, 'index'])->name('comics');

    Route::group(['prefix' => '/api'], function () {
        Route::get('/', [ComicsApiController::class, 'index'])->name('comics.api');
        Route::get('/{comicID}/details', [ComicsApiController::class, 'show'])->name('comics.api.details');
        Route::get('/{comicID}/show', [ComicsApiController::class, 'details'])->name('comics.api.show');
    });
});

Route::group(['prefix' => '/checkouts'], function () {
    Route::get('/', [CheckoutsWebController::class, 'index'])->name('checkouts');
    Route::get('/sale', [CheckoutsWebController::class, 'create'])->name('checkouts.create');
//    Route::get('/{checkoutID}/show',[CheckoutsWebController::class, 'show'])->name('checkouts.show');

    Route::group(['prefix' => '/api'], function () {
        Route::get('/', [CheckoutsApiController::class, 'index'])->name('checkouts.api');
        Route::post('/store', [CheckoutsApiController::class, 'store'])->name('checkouts.api.store');
    });
});
