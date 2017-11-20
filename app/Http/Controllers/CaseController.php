<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Casse;
use App\Victim;
use App\Suspect;
use App\Crime_classification;
use App\Crime_location;
use App\Crime_category;
use App\Crime_type;
use App\Case_detail;
use App\Case_blotter;
use App\Case_victim;
use App\Case_suspect;
use App\Offense;
use App\User_case;

use DB;
use Validator;
use Auth;

class CaseController extends Controller
{
    public function __construct() {

    }

    public function add_view() {
    	$crime_classifications = Crime_classification::all();
    	$regions = DB::table('refregion')->get();
    	$crime_categories = Crime_category::all();
    	$crime_types = Crime_type::all();

    	return view('case.add-view')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('crime_categories', $crime_categories)
                ->with('regions', $regions);
    }

    public function add(Request $request) {

    	$validator = Validator::make($request->all(), [
    		'victim_name' => 'required',
    		'victim_address' => 'required',
    		'victim_occupation' => 'required',
    		'victim_birth_date' => 'required|date_format:"Y-m-d"',
    		'victim_nationality' => 'required',
    		'victim_status' => 'required',
    		'suspect_name' => 'required',
    		'suspect_address' => 'required',
    		'suspect_occupation' => 'required',
    		'suspect_birth_date' => 'required|date_format:"Y-m-d"',
    		'suspect_nationality' => 'required',
    		'suspect_status' => 'required',
    		'crime_classification' => 'required',
    		'region_id' => 'required',
    		'province_id' => 'required',
    		'city_id' => 'required',
    		'home_address' => 'required',
    		'incident_at' => 'required|date_format:"Y-m-d"',
    		'entry_no' => 'required',
    		'reported_at' => 'required|date_format:"Y-m-d"',
    		'crime_type' => 'required',
    		'crime_category' => 'required',
    		'offense_detail' => 'required'
    	]);

    	if ($validator->fails()) {
    		return redirect()->route('case.add.view')->withErrors($validator)->withInput();
    	}

    	$victim = new Victim;
    	$victim->name = $request->input('victim_name');
    	$victim->address = $request->input('victim_address');
    	$victim->occupation = $request->input('victim_occupation');
    	$victim->birth_date = $request->input('victim_birth_date');
    	$victim->gender = $request->input('victim_gender');
    	$victim->civil_status = $request->input('victim_civil_status');
    	$victim->nationality = $request->input('victim_nationality');

    	$victim->save();

    	$case_victim = new Case_victim;
    	$case_victim->victim_id = $victim->victim_id;
    	$case_victim->victim_status = $request->input('victim_status');
    	$case_victim->save();

    	$suspect = new Suspect;
    	$suspect->name = $request->input('suspect_name');
    	$suspect->address = $request->input('suspect_address');
    	$suspect->occupation = $request->input('suspect_occupation');
    	$suspect->birth_date = $request->input('suspect_birth_date');
    	$suspect->gender = $request->input('suspect_gender');
    	$suspect->civil_status = $request->input('suspect_civil_status');
    	$suspect->nationality = $request->input('suspect_nationality');
    	$suspect->save();

    	$case_suspect = new Case_suspect;
    	$case_suspect->suspect_id = $suspect->suspect_id;
    	$case_suspect->suspect_status = $request->input('suspect_status');
    	$case_suspect->save();

    	$crime_location = new Crime_location;
    	$crime_location->region_id = $request->input('region_id');
    	$crime_location->province_id = $request->input('province_id');
    	$crime_location->city_id = $request->input('city_id');
    	$crime_location->home_address = $request->input('home_address');
    	$crime_location->save();

    	$offense = new Offense;
    	$offense->crime_category_id = $request->input('crime_category');
    	$offense->detail = $request->input('offense_detail');
    	$offense->save();

    	$case_detail = new Case_detail;
    	$case_detail->offense_id = $offense->offense_id;
    	$case_detail->crime_location_id = $crime_location->crime_location_id;
    	$case_detail->crime_classification_id = $request->input('crime_classification');
    	$case_detail->incident_at = $request->input('incident_at');
    	$case_detail->save();

    	$case_blotter = new Case_blotter;
    	$case_blotter->entry_no = $request->input('entry_no');
    	$case_blotter->reported_at = $request->input('reported_at');
    	$case_blotter->save();

    	$case = new Casse;
    	$case->case_unique_no = uniqid();
    	$case->victim_id = $victim->victim_id;
    	$case->suspect_id = $suspect->suspect_id;
    	$case->case_blotter_id = $case_blotter->case_blotter_id;
    	$case->case_detail_id = $case_detail->case_detail_id;
        $case->case_status = 'ongoing';

    	if ($case->save()) {

    		$user_case = new User_case;
    		$user_case->user_id = Auth::user()->user_id;
    		$user_case->case_id = $case->case_id;
    		$user_case->save();

    		session()->flash('status', 'Case was successfully added!');
    		return redirect()->route('home');
    	} 

    	session()->flash('status', 'Something went wrong on adding new case');
    	return redirect()->route('home');

    }

    public function list() {
    	$user_cases = DB::table('user_cases')
    						->selectRaw('user_cases.*, crime_categories.name AS crime_category, crime_types.name AS crime_type, crime_classifications.name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no')
    						->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
    						->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
    						->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
    						->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
    						->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
    						->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
    						->where('user_cases.user_id', '=', Auth::user()->user_id)
    						->paginate(1);
    	$latest_cases = DB::table('user_cases')
    						->select('cases.case_unique_no AS case_unique_no', 'users.name as user_name')
    						->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
    						->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
    						->orderBy('user_cases.created_at', 'desc')
    						->limit(5)
    						->get();

    	return view('home')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('user_cases', $user_cases)
                ->with('latest_cases', $latest_cases);
    }

    public function all() {
        $cases = DB::table('user_cases')
                            ->selectRaw('user_cases.*, crime_categories.name AS crime_category, crime_types.name AS crime_type, crime_classifications.name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->paginate(5);

        $latest_cases = DB::table('user_cases')
                            ->select('cases.case_unique_no AS case_unique_no', 'users.name as user_name')
                            ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->orderBy('user_cases.created_at', 'desc')
                            ->limit(5)
                            ->get();

        return view('all_case')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases)
                ->with('latest_cases', $latest_cases);
    }

    public function search(Request $request) {
        $validator = Validator::make($request->all(), [
            'case_no' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $case_no = $request->input('case_no');

        $cases = DB::table('user_cases')
                            ->selectRaw('user_cases.*, crime_categories.name AS crime_category, crime_types.name AS crime_type, crime_classifications.name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->where('cases.case_unique_no', 'like', '%'.$case_no.'%')
                            ->paginate(5);

        $latest_cases = DB::table('user_cases')
                            ->select('cases.case_unique_no AS case_unique_no', 'users.name as user_name')
                            ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->orderBy('user_cases.created_at', 'desc')
                            ->limit(5)
                            ->get();

        return view('all_case')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases)
                ->with('latest_cases', $latest_cases)
                ->with('case_no', $case_no);
    }
}
