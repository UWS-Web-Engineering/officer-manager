<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\offer;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class products extends Controller
{
    function getproduct()
    {
        return product::all();
    }
    function accept(Request $req)
    {
        $emp=product::find($req->id);
        $emp->prodname=$req->prodname;
        $emp->prodprice=$req->prodprice;
        $emp->prodqty=$req->prodqty;
        $emp->fulfill=$req->prodfulfill;
        $emp->farmerid=$req->farmerid;
        $emp->prodstatus=1;
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
