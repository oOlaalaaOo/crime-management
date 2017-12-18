<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class CrimeCategoryController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {

    	$categories = DB::table('crime_categories')
    					->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
    					->get();

    	return view('crime.category.all')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_category')
                ->with('categories', $categories);
    }

    public function add_view()
    {
    	$crime_types = DB::table('crime_types')
    						->get();

    	return view('crime.category.add-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_category')
                ->with('crime_types', $crime_types);
    }

    public function add(Request $request)
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

    	$insert = DB::table('crime_categories')
    					->insert($data);

    	if ($insert)
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

    public function update_view($crime_category_id)
    {
    	$crime_category = DB::table('crime_categories')
    						->where('crime_category_id', '=', $crime_category_id)
    						->first();

    	$crime_types = DB::table('crime_types')
    						->get();

    	return view('crime.category.update-view')
    			->with('active_menu', 'crimes')
                ->with('active_submenu', 'crime_category')
                ->with('crime_category', $crime_category)
                ->with('crime_types', $crime_types);
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
