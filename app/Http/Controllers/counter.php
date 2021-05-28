<?php

namespace App\Http\Controllers;
use App\Models\offer;
use Illuminate\Http\Request;
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
}
