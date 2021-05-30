<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/queries',function(){
    return view('chat');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/operators', function () {
    return view('operators');
});
Route::get('/farmer_response/{farmer_response_dets}',function(){
    return view('farmer_response');
});
Route::get('/farmerdetails/{deal_dets}',function(){
    return view('farmerdetails');
});
Route::get('/farmerslist',function(){
    return view('farmerslist');
});
Route::get('/negotiation',function(){
    return view('negotiation');
});
Route::get('/product',function(){
    return view('productlist');
});
Route::get('/status',function(){
    return view('status');
});