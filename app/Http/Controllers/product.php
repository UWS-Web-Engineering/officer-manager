<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class product extends Controller
{
    function prod(Request $req)
    {
        // $result=["Result"=>"Success"];
        // return $result;
        $emp=new product();
        $emp->prodname=$req->prodname;
        $emp->prodprice=$req->prodprice;
        $emp->prodqty=$req->prodqty;
        $resp=$emp->save();
        $result=["Result"=>"No Success"];
        if($resp)
        {
            $result=["Result"=>"Success"];
        }
        return $result;
    }
}
