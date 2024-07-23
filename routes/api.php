<?php

use App\Http\Controllers\PayMobController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('checkout/processed',[PayMobController::class,'checkout_processed']);