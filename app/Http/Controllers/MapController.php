<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
class MapController extends Controller
{
    public function mapp($case_id)
    {
        $case_details = DB::table('case_details')
                            ->leftJoin('crime_coordinates', 'case_details.case_detail_id', '=', 'crime_coordinates.case_detail_id')
                            ->where('case_details.case_detail_id', '=', $case_id)
                            ->first();

    	return view('cases.map')
    			->with('case_details', $case_details);
    }
}
