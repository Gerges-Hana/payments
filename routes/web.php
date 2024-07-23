<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayMobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('checkout',[CheckoutController::class,'index'])->name('checkout');
// Route::get('checkout/response',function(Request $request){
// return $request->all();
// });

Route::get('checkout/response', function(Request $request) {
    $data = $request->all(); // إذا كنت بحاجة لبعض البيانات

    // إرجاع العرض مع بيانات النجاح
    return view('checkout_response', compact('data'));
});

Route::post('checkout/processed',[PayMobController::class,'checkout_processed']);