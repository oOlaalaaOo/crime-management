<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class CrimeClassificationController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {

    	$classifications = DB::table('crime_classifications')
    					->get();

    	return view('crime.classification.all')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_classification')
                ->with('classifications', $classifications);
    }

    public function add_view()
    {
    	return view('crime.classification.add-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_classification');
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_classification_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_classification_name' => $request->input('crime_classification_name')
    	];

    	$insert = DB::table('crime_classifications')
    					->insert($data);

    	if ($insert)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.classification.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.classification.all');
    	}
    }

    public function update_view($crime_classification_id)
    {
    	$crime_classification = DB::table('crime_classifications')
    						->where('crime_classification_id', '=', $crime_classification_id)
    						->first();

    	return view('crime.classification.update-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_classification')
                ->with('crime_classification', $crime_classification);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_classification_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_classification_name' => $request->input('crime_classification_name')
    	];

    	$update = DB::table('crime_classifications')
    					->where('crime_classification_id', '=', $request->input('crime_classification_id'))
    					->update($data);
    	if ($update)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.classification.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.classification.all');
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
