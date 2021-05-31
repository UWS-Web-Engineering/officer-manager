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
            ->join('officers', 'messages.officerid', '=', 'officers.id')
            ->join('farmers', 'messages.farmerid', '=', 'farmers.id')
            ->select('messages.*', 'farmers.farmername', 'officers.officername')
            ->where('farmerid', '=', $req)
            ->orderBy('id','asc')
            ->get();
    }
    function get_officers_chat($req)
    {
        return DB::table('messages')
            ->join('officers', 'messages.officerid', '=', 'officers.id')
            ->join('farmers', 'messages.farmerid', '=', 'farmers.id')
            ->join('managers','officers.managerid','=','managers.id')
            ->join('crops','crops.farmerid','=','farmers.id')
            ->select('messages.*', 'farmers.farmername', 'officers.officername','managers.companyname','crops.*','messages.id')
            //->where('officerid', '=', $req)
            ->orderBy('messages.id','asc')
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
