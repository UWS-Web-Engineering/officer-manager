<?php

namespace App\Http\Controllers;
use App\Models\crop;
use App\Models\offer;
use App\Models\querie;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class products extends Controller
{
    function getproduct()
    {
        return crop::all();
    }
    function accept(Request $req)
    {
        $emp=crop::find($req->id);
        $emp->cropname=$req->prodname;
        $emp->cropprice=$req->prodprice;
        $emp->cropqty=$req->prodqty;
        $emp->expecteddate=$req->prodfulfill;
        $emp->farmerid=$req->farmerid;
        $emp->cropstatus=1;
        $resp=$emp->save();
        $result=["Result"=>"Offer Accepted fail"];
        if($resp)
        {
            $result=["Result"=>"Success Offer Accepted"];
        }
        return $result;
    }
    function reject(Request $req)
    {
        $emp=offer::find($req->id);
        $emp->rejected=1;
        $resp=$emp->save();
        $result=["Result"=>"Offer Reject fail"];
        if($resp)
        {
            $result=["Result"=>"Success Offer Rejected"];
        }
        return $result;
    }
}
