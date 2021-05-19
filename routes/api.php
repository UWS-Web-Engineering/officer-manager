<?php

use App\Http\Controllers\negotiations;
use App\Http\Controllers\productsave;
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
Route::get("negotiations/{negotiations}",[negotiations::class,'negotiate']); 
// Route::get("negotiations",[negotiations::class,'negotiate']); 