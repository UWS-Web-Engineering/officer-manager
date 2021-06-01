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
Route::post("https://gateway.include.ninja/api/officer-manager/addmanager",[managers::class,'addmanager']);
Route::get("https://gateway.include.ninja/api/officer-manager/getmanagers",[managers::class,'getmanagers']);
Route::post("https://gateway.include.ninja/api/officer-manager/addofficer",[officers::class,'addofficer']);
Route::get("https://gateway.include.ninja/api/officer-manager/getofficerid/{ucid}",[officers::class,"getofficerid"]);
Route::get("https://gateway.include.ninja/api/officer-manager/getmanagerid/{ucid}",[managers::class,"getmanagerid"]);
Route::post("https://gateway.include.ninja/api/officer-manager/product",[productsave::class,'prod']); 
Route::get("https://gateway.include.ninja/api/officer-manager/negotiations",[negotiations::class,'negotiate']); 
Route::get("https://gateway.include.ninja/api/officer-manager/products",[products::class,'getproduct']);
Route::get("https://gateway.include.ninja/api/officer-manager/farmer_response/{farmer_response_dets}",[negotiations::class,'negotiate_dets']); 
Route::put("https://gateway.include.ninja/api/officer-manager/counter",[counter::class,'counter_offer']);
Route::put("https://gateway.include.ninja/api/officer-manager/accept",[products::class,'accept']);
Route::put("https://gateway.include.ninja/api/officer-manager/reject",[products::class,'reject']);
Route::get("https://gateway.include.ninja/api/officer-manager/farmerslist",[farmers::class,'farmerslist']); 
Route::get("https://gateway.include.ninja/api/officer-manager/farmerdetails/{deal_dets}",[farmers::class,'deal_dets']);
Route::get("https://gateway.include.ninja/api/officer-manager/chat",[farmers::class,'all_farmers_for_chat']);
Route::get("https://gateway.include.ninja/api/officer-manager/chat/{chatfarmer}",[queries::class,'get_farmer_chat']);
Route::put("https://gateway.include.ninja/api/officer-manager/sendmessage",[queries::class,'addFarmerMessage']);
Route::post("https://gateway.include.ninja/api/officer-manager/startmessage",[queries::class,'newmessage']);
Route::get("https://gateway.include.ninja/api/officer-manager/farmerchat",[farmers::class,'all_officers_for_chat']);
Route::get("https://gateway.include.ninja/api/officer-manager/farmerchat/{chatofficer}",[queries::class,'get_officers_chat']);
//Betina
Route::get("https://gateway.include.ninja/api/officer-manager/get_all_crops_farmers/{farmerid}",[products::class,'get_all_crops_farmers']);
Route::get("https://gateway.include.ninja/api/officer-manager/get_managers_for_farmers",[products::class,'get_managers_for_farmers']);
Route::get("https://gateway.include.ninja/api/officer-manager/get_officers_under_manager",[farmers::class,'get_officers_under_manager']);
Route::get("https://gateway.include.ninja/api/officer-manager/get_all_dets",[farmers::class,'get_all_dets']);
Route::get("https://gateway.include.ninja/api/officer-manager/get_all_queries",[queries::class,"get_all_queries"]);
Route::get("https://gateway.include.ninja/api/officer-manager/get_all_queries_by_officer",[queries::class,'get_all_queries_by_officer']);

Route::post("https://gateway.include.ninja/api/officer-manager/addfarmers", [farmers::class,'addfarmers']);
//ads
Route::get("https://gateway.include.ninja/api/officer-manager/all_crops_for_farmers_to_make_an_offer",[products::class,'all_crops_for_farmers_to_make_an_offer']);
Route::get("https://gateway.include.ninja/api/officer-manager/all_dets_of_a_crop_products/{cropid}",[products::class,"all_dets_of_a_crop_products"]);
Route::put("https://gateway.include.ninja/api/officer-manager/farmer_accept_product",[products::class,"farmer_accept_product"]);//find by cropid
Route::post("https://gateway.include.ninja/api/officer-manager/creating_counter",[counter::class,"creating_counter"]);
Route::get("https://gateway.include.ninja/api/officer-manager/get_all_countered_offers_farmer/{farmerid}",[counter::class,"get_all_countered_offers_farmer"]);