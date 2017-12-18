<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class CrimeTypeController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {

    	$types = DB::table('crime_types')
    					->get();

    	return view('crime.type.all')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_type')
                ->with('types', $types);
    }

    public function add_view()
    {
    	return view('crime.type.add-view')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '');
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_type_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_type_name' => $request->input('crime_type_name')
    	];

    	$insert = DB::table('crime_types')
    					->insert($data);

    	if ($insert)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.type.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.type.all');
    	}
    }

    public function update_view($crime_type_id)
    {
    	$crime_type = DB::table('crime_types')
    						->where('crime_type_id', '=', $crime_type_id)
    						->first();

    	return view('crime.type.update-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_type')
                ->with('crime_type', $crime_type);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_type_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_type_name' => $request->input('crime_type_name')
    	];

    	$update = DB::table('crime_types')
    					->where('crime_type_id', '=', $request->input('crime_type_id'))
    					->update($data);
    	if ($update)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.type.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.type.all');
    	}

    }

    public function delete(Request $request)
    {
    	$delete = DB::table('crime_types')
    					->where('crime_type_id', '=', $request->input('crime_type_id'))
    					->delete();

    	if ($delete)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.type.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.type.all');
    	}
    }
}
