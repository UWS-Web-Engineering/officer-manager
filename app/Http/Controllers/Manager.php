<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class Manager extends Controller
{
    function dashboardcounter($companyID){
    	// $officers = DB::table('Officer')->count();
    	// $products = DB::table('products')->count();
    	// $farmers = DB::table('products')->where('farmerid','<>','')->count();
     //    $queries = DB::table('queries')->count();
     //    $return = array('officers'=>$officers,
    	// 				'products'=>$products,
    	// 				'farmers' => $farmers,
    	// 				'queries' => $queries
    	// 				);

    	$return = array('officers'=>2,
    					'products'=>12,
    					'farmers' => 10,
    					'queries' => 5
    					);

        return json_encode($return);
    }

    function cropsByRegion(){
    	$return = array('NSW'=>2,
    					'QLD'=>12,
    					'SA' => 10,
    					'TAS' => 5,
    					'VIC' => 100,
    					'WA' =>30
    					);

        return json_encode($return);
    }

    function farmersByRegion(){
    	$return = array('NSW'=>20,
    					'QLD'=>10,
    					'SA' => 30,
    					'TAS' => 20,
    					'VIC' => 10,
    					'WA' =>30
    					);

        return json_encode($return);
    }

    function farmerQueries(){

    	$return = DB::table('queries')
                        ->join('farmers','queries.farmerid','=','farmers.id')
                        ->join('officers','queries.officerid','=','officers.id')
                        ->select('farmers.farmername','officers.officername','queries.farmerquery','queries.date','queries.officerquery')
                        ->orderBy('queries.id','desc')
                        ->get();

   //  	$return = [
			// array("farmername"=>"Justin",
			// 	"UserName"=>"Justin",
			// 	"farmerquery"=>"How long does it take to grow rice?",
			// 	"date"=>"2021-05-24"),
			// array("farmername"=>"Jake",
			// 	"UserName"=>"Jake",
			// 	"farmerquery"=>"Can we come to pick by date?",
			// 	"date"=>"2021-05-24"),
			// array("farmername"=>"Roji",
			// 	"UserName"=>"Roji",
			// 	"farmerquery"=>"How are you going?",
			// 	"date"=>"2021-05-24")
			// ];

        return json_encode($return);

    }

    function getMyOfficers() {
        $companyID = 1;
        //$return = DB::table('officers')->where('CompanyID',$companyID)->get();
        $return = DB::table('officers')->get();

        //return json_encode($return);
        return $return;
    }

    function getproducts()
    {
        return DB::table('crops')
        ->leftJoin('offers','offers.cropid','=','crops.id')
        ->leftJoin('officers','crops.officerid','=','officers.id')
        ->select('crops.*','offers.officerid','offers.negotiation','crops.cropstatus','officers.officername')
        ->get();
        //return crop::all();
    }

    function myfarmers()
    {
        return DB::table('crops')
        ->join('farmers','farmers.id','=','crops.farmerid')
        ->leftJoin('officers','officers.id','=','crops.officerid')
        ->select('crops.*','farmers.*','officers.officername')
        ->where('crops.cropstatus','=','1')
        ->get();
    }
}
