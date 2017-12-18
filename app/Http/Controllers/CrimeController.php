<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CrimeController extends Controller
{
    public function __construct()
    {

    }

    public function type_all()
    {

    	$types = DB::table('crime_types')
    					->get();

    	return view('crime.type.all')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('crime_categories', $crime_categories)
                ->with('regions', $regions);
    }

    public function type_add_view()

}
