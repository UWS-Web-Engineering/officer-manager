<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\offer;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class negotiations extends Controller
{
    function negotiate()
    {
        return DB::table('offers')
        ->join('farmers','offers.farmerid','=','farmers.id')
        ->join('products','offers.productid','=','products.id')
        ->select('products.prodname','farmers.farmername','offers.id','offers.fulfill','products.prodstatus')
        ->get();
    }
    function negotiate_dets($req)
    {
        return DB::table('offers')
        ->join('farmers','offers.farmerid','=','farmers.id')
        ->join('products','offers.productid','=','products.id')
        ->select('products.prodname','farmers.farmername','offers.id','offers.fulfill','products.prodstatus','offers.prodqty','offers.prodprice')
        ->where('offers.id','=',$req)
        ->get();
    }
}
