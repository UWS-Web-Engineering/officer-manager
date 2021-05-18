<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class productsave extends Controller
{
    function prod(Request $req)
    {
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
