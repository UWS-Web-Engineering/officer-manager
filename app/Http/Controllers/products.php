<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class products extends Controller
{
    function getproduct()
    {
        return product::all();
    }
}
