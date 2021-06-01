<?php

namespace App\Http\Controllers;

use App\Models\officer;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;

class officers extends Controller
{
    function addofficer(Request $req)
    {
        $emp = new officer();
        $emp->managerid = $req->managerid;
        $emp->officername = $req->officername;
        $emp->email = $req->email;
        $emp->usercontrollerid = $req->usercontrollerid;
        $resp = $emp->save();
        $result = ["Result" => "No Success"];
        if ($resp) {
            $result = ["Result" => "Success"];
        }
        return $result;
    }
    //giving local storage the officer id
    function getofficerid($req)
    {
        return DB::table('officers')
        ->join('managers','officers.managerid','=','managers.id')
        ->select('officers.id','officers.officername','managers.companyname')
        ->where('officers.usercontrollerid', '=', $req)
        ->get();
    }
}
