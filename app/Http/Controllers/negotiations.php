<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class negotiations extends Controller
{
    function negotiate($req)
    {
        // $req=new product();
        
        // return $req->all();
        return product::where("negotiations",$req)->get();
    }
}
