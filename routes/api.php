<?php

use App\Http\Controllers\Api\ClickMassaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('click-massa', [ClickMassaController::class, 'webhook'])->name('click-massa');
