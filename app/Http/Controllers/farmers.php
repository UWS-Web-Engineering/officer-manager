<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class farmers extends Controller
{
    function farmerslist()
    {
        return DB::table('products')
        ->join('farmers','farmers.id','=','products.farmerid')
        ->select('products.*','farmers.*')
        ->where('products.prodstatus','=','1')
        ->get();
    }
    function deal_dets($req)
    {
        return DB::table('products')
        ->join('farmers','farmers.id','=','products.farmerid')
        ->select('products.*','farmers.*')
        ->where('products.id','=',$req)
        ->get();
    }
}
