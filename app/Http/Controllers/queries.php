<?php

namespace App\Http\Controllers;

use App\Models\farmer;
use App\Models\message;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;

class queries extends Controller
{
    function get_farmer_chat($req)
    {
        return DB::table('messages')
            ->join('Officer', 'messages.officerid', '=', 'Officer.id')
            ->join('Farmer', 'messages.farmerid', '=', 'Farmer.id')
            ->select('messages.*', 'Farmer.farmername', 'Officer.officername')
            ->where('farmerid', '=', $req)
            ->get();
    }
    function newmessage(Request $req)
    {
        $emp=new message();
        $emp->farmerid=$req->farmerid;
        $emp->officermessage=$req->mymessage;
        $emp->officerid=1;
        $emp->isread= false;
        
        $resp=$emp->save();
        $result=["Result"=>"No Success Update"];
        if($resp)
        {
            $result=["Result"=>"Success Update"];
        }
        return $result;
    }
    function addFarmerMessage(Request $req)
    {
        $emp=message::find($req->id);
        $emp->farmermessage=$req->farmermessage;
        $emp->isread= true;
        $resp=$emp->save();
        $result=["Result"=>"No Success Update"];
        if($resp)
        {
            $result=["Result"=>"Success Update"];
        }
        return $result;
    }
}
