<?php

namespace App\Http\Controllers;
use App\Models\crop;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class productsave extends Controller
{
    function prod(Request $req)
    {
        $emp=new crop();
        $emp->cropname=$req->prodname;
        $emp->cropimg=$req->prodimg;
        $emp->cropprice=$req->prodprice;
        $emp->cropqty=$req->prodqty;
        $emp->expecteddate=$req->prodfulfill;
        $emp->cropstatus=null;
        $emp->officerid=1;
        $resp=$emp->save();
        $result=["Result"=>"No Success"];
        if($resp)
        {
            $result=["Result"=>"Success"];
        }
        return $result;
    }
}
