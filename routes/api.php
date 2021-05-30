<?php

use App\Http\Controllers\negotiations;
use App\Http\Controllers\productsave;
use App\Http\Controllers\counter;
use App\Http\Controllers\farmers;
use App\Http\Controllers\products;
use App\Http\Controllers\queries;
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
Route::post("http://officermanager.include.ninja/api/product",[productsave::class,'prod']); 
Route::get("negotiations",[negotiations::class,'negotiate']); 
Route::get("products",[products::class,'getproduct']);
Route::get("farmer_response/{farmer_response_dets}",[negotiations::class,'negotiate_dets']); 
Route::put("counter",[counter::class,'counter_offer']);
Route::put("accept",[products::class,'accept']);
Route::put("reject",[products::class,'reject']);
Route::get("farmerslist",[farmers::class,'farmerslist']); 
Route::get("farmerdetails/{deal_dets}",[farmers::class,'deal_dets']);
Route::get("chat",[farmers::class,'all_farmers_for_chat']);
Route::get("chat/{chatfarmer}",[queries::class,'get_farmer_chat']);
Route::put("sendmessage",[queries::class,'addFarmerMessage']);
Route::post("startmessage",[queries::class,'newmessage']);