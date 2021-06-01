<?php

namespace App\Http\Controllers;
use App\Models\crop;
use App\Models\offer;
use App\Models\querie;
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class products extends Controller
{
    function getproduct()
    {
        return DB::table('crops')
        ->leftJoin('offers','offers.cropid','=','crops.id')
        ->select('crops.*','offers.officerid','offers.negotiation','crops.cropstatus')
        ->get();
        //return crop::all();
    }
    function accept(Request $req)
    {
        $emp=crop::find($req->id);
        $emp->cropname=$req->prodname;
        $emp->cropprice=$req->prodprice;
        $emp->cropqty=$req->prodqty;
        $emp->expecteddate=$req->prodfulfill;
        $emp->farmerid=$req->farmerid;
        $emp->cropstatus=1;
        $resp=$emp->save();
        $result=["Result"=>"Offer Accepted fail"];
        if($resp)
        {
            $result=["Result"=>"Success Offer Accepted"];
        }
        return $result;
    }
    function reject(Request $req)
    {
        $emp=offer::find($req->id);
        $emp->rejected=1;
        $resp=$emp->save();
        $result=["Result"=>"Offer Reject fail"];
        if($resp)
        {
            $result=["Result"=>"Success Offer Rejected"];
        }
        return $result;
    }
    function get_all_crops_farmers($req)
    {
        return DB::table('crops')
        ->select('crops.id','crops.cropname','crops.cropimg','crops.cropqty')
        ->where('farmerid', '=',$req)
        ->get();
    }
    function get_managers_for_farmers(Request $req)
    {
        return DB::table('crops')
        ->join('officers','officers.id','=','crops.officerid')
        ->join('managers','officers.managerid','=','managers.id')
        ->select('managers.id','managers.companyname','crops.cropqty','crops.cropname')
        ->where([['farmerid', '=',$req->farmerid],['crops.id', '=',$req->cropid]])
        ->get();
    }
    function all_crops_for_farmers_to_make_an_offer()
    {
        return DB::table('crops')
        ->leftjoin('officers','crops.officerid','=','officers.id')
        ->leftjoin('managers','officers.managerid','=','managers.id')
        ->select('crops.cropname','crops.id','crops.cropqty','crops.officerid','managers.companyname')
        ->get();
    }
    function all_dets_of_a_crop_products($req)
    {
        return DB::table('crops')
        ->leftjoin('officers','crops.officerid','=','officers.id')
        ->leftjoin('managers','officers.managerid','=','managers.id')
        ->select('crops.cropname','crops.id','crops.cropqty','crops.cropprice','crops.expecteddate','crops.officerid','managers.companyname')
        ->where('crops.id','=',$req)
        ->get();
    }
    function farmer_accept_product(Request $req)
    {
        $emp=crop::find($req->id);
        $emp->cropname=$req->cropname;
        $emp->cropprice=$req->cropprice;
        $emp->cropqty=$req->cropqty;
        $emp->expecteddate=$req->expecteddate;
        $emp->farmerid=$req->farmerid;
        $emp->officerid=$req->officerid;
        $emp->cropstatus=1;
        $resp=$emp->save();
        $result=["Result"=>"Offer Accepted fail"];
        if($resp)
        {
            $result=["Result"=>"Success Offer Accepted"];
        }
        return $result;
    }
}
