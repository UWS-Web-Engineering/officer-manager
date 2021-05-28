<?php

namespace App\Http\Controllers;

use App\Models\farmer;
use App\Models\product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class farmers extends Controller
{
    function farmerslist()
    {
        return DB::table('crops')
        ->join('Farmer','Farmer.id','=','crops.farmerid')
        ->select('crops.*','Farmer.*')
        ->where('crops.cropstatus','=','1')
        ->get();
    }
    function deal_dets($req)
    {
        return DB::table('crops')
        ->join('Farmer','Farmer.id','=','crops.farmerid')
        ->select('crops.*','Farmer.*')
        ->where('crops.farmerid','=',$req)
        ->get();
    }
    function all_farmers_for_chat()
    {
        return DB::table('crops')
        ->join('Farmer','crops.farmerid','=','Farmer.id')
        ->join('Officer','crops.officerid','=','Officer.id')
        ->select('Farmer.*','Officer.*','crops.farmerid')
        ->get();
    }
}
