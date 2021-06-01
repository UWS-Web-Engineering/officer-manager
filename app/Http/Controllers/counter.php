<?php

namespace App\Http\Controllers;
use App\Models\offer;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class counter extends Controller
{
    function counter_offer(Request $req)
    {
        $emp=offer::find($req->id);
        $emp->cropprice=$req->prodprice;
        $emp->cropqty=$req->prodqty;
        $emp->expecteddate=$req->prodfulfill;
        $emp->negotiation=0;
        $resp=$emp->save();
        $result=["Result"=>"No Success Update"];
        if($resp)
        {
            $result=["Result"=>"Success Update"];
        }
        return $result;
    }
    function creating_counter(Request $req)
    {
        $emp=new offer();
        $emp->cropid=$req->cropid;
        $emp->farmerid=$req->farmerid;
        $emp->cropprice=$req->cropprice;
        $emp->cropqty=$req->cropqty;
        $emp->expecteddate=$req->expecteddate;
        $emp->officerid=$req->officerid;
        $emp->negotiation=1;
        $resp=$emp->save();
        $result=["Result"=>"No Success"];
        if($resp)
        {
            $result=["Result"=>"Success"];
        }
        return $result;
    }
    function get_all_countered_offers_farmer($req)
    {
        return DB::table('offers')
        ->join('crops','offers.cropid','=')
        ->join('officers','offers.officerid','=','officers.id')
        ->join('managers','officers.managerid','=','managers.id')
        ->select('officers.id','offers.id','managers.companyname','crop')
        ->where('officers.usercontrollerid', '=', $req)
        ->get();
    }
}
