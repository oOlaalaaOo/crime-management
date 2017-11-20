<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class VictimController extends Controller
{
    public function __construct() {

    }

    public function all() {
    	$victims = DB::table('case_victims')                         
                            ->leftJoin('victims', 'case_victims.victim_id', '=', 'victims.victim_id')
                            ->paginate(5);

        return view('victims')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('victims', $victims);
    }

    public function search(Request $request) {
        $name = $request->input('name');

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $victims = DB::table('case_victims')                         
                            ->leftJoin('victims', 'case_victims.victim_id', '=', 'victims.victim_id')
                            ->where('victims.name', 'like', '%'.$name.'%')
                            ->paginate(5);

        return view('victims')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('victims', $victims)
                ->with('name', $name);
    }
}
