<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\offer;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class negotiations extends Controller
{
    function negotiate($req)
    {
        return DB::table('offers')
        ->join('farmers','offers.farmerid','=','farmers.id')
        ->join('crops','offers.cropid','=','crops.id')
        ->select('crops.cropname','farmers.farmername','offers.id','offers.expecteddate','crops.cropstatus','offers.rejected','crops.cropstatus')
        ->where([['offers.rejected','=',0],['offers.officerid','=',$req]])
        ->get();
    }
    function negotiate_dets($req)
    {
        return DB::table('offers')
        ->join('farmers','offers.farmerid','=','farmers.id')
        ->join('crops','offers.cropid','=','crops.id')
        ->select('crops.cropname','farmers.farmername','offers.id','offers.expecteddate','crops.cropstatus','offers.cropqty','offers.cropprice','offers.farmerid','offers.cropid','offers.negotiation')
        ->where('offers.id','=',$req)
        ->get();
    }
}
