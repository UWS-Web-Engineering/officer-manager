<?php

namespace App\Http\Controllers;

use App\Models\farmer;
use App\Models\product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
Use Illuminate\Support\Facades\DB;

class farmers extends Controller
{
    function farmerslist()
    {
        return DB::table('crops')
        ->join('farmers','farmers.id','=','crops.farmerid')
        ->select('crops.*','farmers.*')
        ->where('crops.cropstatus','=','1')
        ->get();
    }
    function deal_dets($req)
    {
        return DB::table('crops')
        ->join('farmers','farmers.id','=','crops.farmerid')
        ->select('crops.*','farmers.*')
        ->where('crops.farmerid','=',$req)
        ->get();
    }
    function all_officers_for_chat()
    {
        return DB::table('crops')
        ->join('farmers','crops.farmerid','=','farmers.id')
        ->join('officers','crops.officerid','=','officers.id')
        ->select('farmers.*','officers.*','crops.farmerid')
        ->get();
    }
    function all_farmers_for_chat()
    {
        return DB::table('crops')
        ->join('farmers','crops.farmerid','=','farmers.id')
        ->join('officers','crops.officerid','=','officers.id')
        ->select('farmers.*','officers.*','crops.farmerid')
        ->get();
    }
    function get_officers_under_manager(Request $req)
    {
        return DB::table('crops')
        ->join('officers','officers.id','=','crops.officerid')
        ->join('managers','officers.managerid','=','managers.id')
        ->select('officers.id','officers.officername','managers.companyname')
        ->where([['managers.id', '=',$req->managerid],['crops.farmerid', '=',$req->farmerid]])
        ->get();
    }
    function get_all_dets(Request $req)
    {
        return DB::table('crops')
        ->join('officers','officers.id','=','crops.officerid')
        ->join('managers','officers.managerid','=','managers.id')
        ->select('officers.id','officers.officername','crops.cropname','crops.expecteddate','crops.cropqty','crops.cropprice')
        ->where([['crops.officerid', '=',$req->officerid],['crops.farmerid', '=',$req->farmerid]])
        ->get();
    }
    function addfarmers(Request $req){
        $farmers = new farmer();
        $farmers->farmeremail = $req->farmeremail;
        $farmers->farmername = $req->farmername;
        $farmers->farmerphone = $req->farmerphone;
        $farmers->farmeraddress = $req->farmeraddress;
        $farmers->usercontrollerid = $req->usercontrollerid;
        $farmers->regionId = $req->regionId;
        $resp = $farmers->save();
        $result = ["Result" => "Data was not successfully been saved"];
        if ($resp){
            $result = ["Result" => "Data was successfully saved"];
        }

        return $result;
    }
}
