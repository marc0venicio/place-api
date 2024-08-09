<?php

declare(strict_types=1);

use App\Presenter\Http\User\Create\CreatePlaceController;
use App\Presenter\Http\User\Delete\DeleteUserController;
use App\Presenter\Http\User\Index\IndexUserController;
use App\Presenter\Http\User\Load\LoadUserController;
use App\Presenter\Http\User\Update\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::post('', CreatePlaceController::class);
    Route::get('', IndexUserController::class);
    Route::get('/{userId}', LoadUserController::class);
    Route::put('/{userId}', UpdateUserController::class);
    Route::delete('/{userId}', DeleteUserController::class);
});
