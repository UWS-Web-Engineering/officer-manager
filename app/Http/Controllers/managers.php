<?php

namespace App\Http\Controllers;
use App\Models\manager;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class managers extends Controller
{
    function addmanager(Request $req)
    {
        $emp=new manager();
        $emp->companyname=$req->companyname;
        $emp->managername=$req->managername;
        $emp->manageremail=$req->email;
        $emp->usercontrollerid=$req->usercontrollerid;
        $resp=$emp->save();
        $result=["Result"=>"No Success"];
        if($resp)
        {
            $result=["Result"=>"Success"];
        }
        return $result;
    }
    //drop down on login page
    function getmanagers()
    {
        return DB::table('managers')
        ->select('id','companyname')
        ->get();
    }
    //giving local storage the manager id
    function getmanagerid($req)
    {
        return DB::table('managers')
        ->select('id','companyname','managername')
        ->where('usercontrollerid', '=', $req)
        ->get();
    }
}
