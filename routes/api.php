<?php

use App\Http\Controllers\negotiations;
use App\Http\Controllers\productsave;
use App\Http\Controllers\counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("product",[productsave::class,'prod']); 
Route::get("negotiations",[negotiations::class,'negotiate']); 
Route::get("farmer_response/{farmer_response_dets}",[negotiations::class,'negotiate_dets']); 
Route::put("counter",[counter::class,'counter_offer']);