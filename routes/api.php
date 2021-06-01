<?php

use App\Http\Controllers\negotiations;
use App\Http\Controllers\productsave;
use App\Http\Controllers\counter;
use App\Http\Controllers\farmers;
use App\Http\Controllers\products;
use App\Http\Controllers\queries;
use App\Http\Controllers\managers;
use App\Http\Controllers\officers;
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
Route::post("addmanager",[managers::class,'addmanager']);
Route::get("getmanagers",[managers::class,'getmanagers']);
Route::post("addofficer",[officers::class,'addofficer']);
Route::get("getofficerid/{ucid}",[officers::class,"getofficerid"]);
Route::get("getmanagerid/{ucid}",[managers::class,"getmanagerid"]);
Route::post("product",[productsave::class,'prod']); 
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
Route::get("farmerchat",[farmers::class,'all_officers_for_chat']);
Route::get("farmerchat/{chatofficer}",[queries::class,'get_officers_chat']);
//Betina
Route::get("get_all_crops_farmers/{farmerid}",[products::class,'get_all_crops_farmers']);
Route::get("get_managers_for_farmers",[products::class,'get_managers_for_farmers']);
Route::get("get_officers_under_manager",[farmers::class,'get_officers_under_manager']);
Route::get("get_all_dets",[farmers::class,'get_all_dets']);
Route::get("get_all_queries",[queries::class,"get_all_queries"]);
Route::get("get_all_queries_by_officer",[queries::class,'get_all_queries_by_officer']);

Route::post("addfarmers", [farmers::class,'addfarmers']);
//ads
Route::get("all_crops_for_farmers_to_make_an_offer",[products::class,'all_crops_for_farmers_to_make_an_offer']);
Route::get("all_dets_of_a_crop_products/{cropid}",[products::class,"all_dets_of_a_crop_products"]);
Route::put("farmer_accept_product",[products::class,"farmer_accept_product"]);//find by cropid
Route::post("creating_counter",[counter::class,"creating_counter"]);
Route::get("get_all_countered_offers_farmer/{farmerid}",[counter::class,"get_all_countered_offers_farmer"]);