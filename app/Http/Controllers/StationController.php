<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class StationController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {
    	$stations = DB::table('police_stations')
    					->paginate(5);

    	return view('stations.all')
    			->with('active_menu', 'stations')
                ->with('active_submenu', '')
    			->with('stations', $stations);
    }

    public function add_view()
    {
    	return view('stations.add')
    			->with('active_menu', 'stations')
                ->with('active_submenu', '');
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'station'	=> 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$station = new \App\Police_station;
    	$station->station = $request->input('station');
    	$station->station_no = '';

    	if ($station->save())
    	{
    		session()->flash('status', true);
    	}
    	else
    	{
    		session()->flash('status', false);
    	}

    	return redirect()->route('stations.all');
    }

    public function show($station_id)
    {
    	$station = DB::table('police_stations')->where('police_station_id', $station_id)->first();

    	return view('stations.show')
    			->with('active_menu', 'stations')
                ->with('active_submenu', '')
                ->with('station', $station);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'station'	=> 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$station = \App\Police_station::find($request->station_id);
    	$station->station = $request->input('station');
    	$station->station_no = '';

    	if ($station->save())
    	{
    		session()->flash('status', true);
    	}
    	else
    	{
    		session()->flash('status', false);
    	}

    	return redirect()->route('stations.all');
    }
}
