<?php

namespace App\Http\Controllers;

use App\Models\farmer;
use App\Models\querie;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;

class queries extends Controller
{
    function get_farmer_chat($req)
    {
        return DB::table('queries')
            ->join('officers', 'queries.officerid', '=', 'officers.id')
            ->join('farmers', 'queries.farmerid', '=', 'farmers.id')
            ->select('queries.*', 'farmers.farmername', 'officers.officername')
            ->where('farmerid', '=', $req)
            ->get();
    }
    function sendmessage(Request $req)
    {
        $emp=querie::find($req->id);
        $emp->officerquery=$req->mymessage;
        $emp->officerid=1;
        $emp->isread=true;
        $resp=$emp->save();
        $result=["Result"=>"No Success Update"];
        if($resp)
        {
            $result=["Result"=>"Success Update"];
        }
        return $result;
    }
    function newmessage(Request $req)
    {
        $emp=new querie();
        $emp->farmerid=$req->farmerid;
        $emp->officerquery=$req->mymessage;
        $emp->officerid=1;
        $emp->isread=false;
        $resp=$emp->save();
        $result=["Result"=>"No Success Update"];
        if($resp)
        {
            $result=["Result"=>"Success Update"];
        }
        return $result;
    }
}
