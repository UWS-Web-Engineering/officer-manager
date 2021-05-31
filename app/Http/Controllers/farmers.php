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
        ->join('farmers','farmers.id','=','crops.farmerid')
        ->select('crops.*','farmers.*')
        ->where('crops.cropstatus','=','1')
        ->get();
    }
    function deal_dets($req)
    {
        return DB::table('crops')
        ->join('farmers','farmers.id','=','crops.farmerid')
        ->select('crops.*','farmers.*')
        ->where('crops.farmerid','=',$req)
        ->get();
    }
    function all_officers_for_chat()
    {
        return DB::table('crops')
        ->join('farmers','crops.farmerid','=','farmers.id')
        ->join('officers','crops.officerid','=','officers.id')
        ->select('farmers.*','officers.*','crops.farmerid')
        ->get();
    }
    function all_farmers_for_chat()
    {
        return DB::table('crops')
        ->join('farmers','crops.farmerid','=','farmers.id')
        ->join('officers','crops.officerid','=','officers.id')
        ->select('farmers.*','officers.*','crops.farmerid')
        ->get();
    }
}
