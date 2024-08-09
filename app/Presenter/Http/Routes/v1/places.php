<?php

declare(strict_types=1);

use App\Presenter\Http\Places\Delete\DeletePlaceController;
use App\Presenter\Http\Places\Create\CreatePlaceController;
use App\Presenter\Http\Places\Index\IndexPlaceController;
use App\Presenter\Http\Places\Load\LoadPlaceController;
use App\Presenter\Http\Places\Update\UpdatePlaceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/places')->group(function () {

    Route::post('', CreatePlaceController::class);
    Route::get('', IndexPlaceController::class);
    Route::get('/{placeId}', LoadPlaceController::class);
    Route::put('/{placeId}', UpdatePlaceController::class);
    Route::delete('/{placeId}', DeletePlaceController::class);
});
