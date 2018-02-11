<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class OffenseController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {

    	$offenses = DB::table('offenses')
    					->leftJoin('crime_categories', 'crime_categories.crime_category_id', '=', 'crime_categories.crime_category_id')
    					->paginate(5);

    	return view('crime.offense.all')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'offense')
                ->with('offenses', $offenses);
    }

    public function add_view()
    {
    	$crime_categories = DB::table('crime_categories')
    						->get();

    	return view('crime.offense.add-view')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_categories', $crime_categories);
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_category_id' => 'required',
    		'offense_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_category_id' => $request->input('crime_category_id'),
    		'offense_name' => $request->input('offense_name')
    	];

    	$insert = DB::table('offenses')
    					->insert($data);

    	if ($insert)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.offense.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.offense.all');
    	}
    }

    public function update_view($offense_id)
    {
    	$offense = DB::table('offenses')
    						->where('offense_id', '=', $offense_id)
    						->first();

    	$crime_categories = DB::table('crime_categories')
    						->get();

    	return view('crime.offense.update-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'offense')
                ->with('crime_categories', $crime_categories)
                ->with('offense', $offense);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'crime_type_id' => 'required',
    		'crime_category_name' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'crime_type_id' => $request->input('crime_type_id'),
    		'crime_category_name' => $request->input('crime_category_name')
    	];

    	$update = DB::table('crime_categories')
    					->where('crime_category_id', '=', $request->input('crime_category_id'))
    					->update($data);
    	if ($update)
    	{
    		session()->flash('status', true);
    		return redirect()->route('crime.category.all');
    	}
    	else
    	{
    		session()->flash('status', false);
    		return redirect()->route('crime.category.all');
    	}

    }
}
