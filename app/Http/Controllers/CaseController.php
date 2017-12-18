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
use App\Case_folder;

use DB;
use Validator;
use Auth;
use Image;
use File;

class CaseController extends Controller
{
    public function __construct() {

    }

    public function add_view() {
    	$crime_classifications = Crime_classification::all();
    	$regions = DB::table('refregion')->get();
    	$crime_categories = Crime_category::all();
    	$crime_types = Crime_type::all();

    	return view('cases.add-view')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('crime_categories', $crime_categories)
                ->with('regions', $regions);
    }

    public function add(Request $request) {

    	$validator = Validator::make($request->all(), [
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
    	$case->case_blotter_id = $case_blotter->case_blotter_id;
    	$case->case_detail_id = $case_detail->case_detail_id;
        $case->case_status = 'ongoing';

    	if ($case->save()) {

    		$user_case = new User_case;
    		$user_case->user_id = Auth::user()->user_id;
    		$user_case->case_id = $case->case_id;
    		$user_case->save();

    		session()->flash('status', true);
    		return redirect()->route('home');
    	} 

    	session()->flash('status', false);
    	return redirect()->route('home');

    }

    public function all() {

        $cases = DB::table('user_cases')
                        ->selectRaw('user_cases.*, crime_categories.crime_category_name AS crime_category, crime_types.crime_type_name AS crime_type, crime_classifications.crime_classification_name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no, cases.case_status AS case_status, users.name')
                        ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                        ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                        ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                        ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                        ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                        ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                        ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                        ->where('user_cases.user_id', '=', Auth::user()->user_id)
                        ->get();

        return view('cases.show-all')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases);
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
                            ->selectRaw('user_cases.*, crime_categories.crime_category_name AS crime_category, crime_types.crime_type_name AS crime_type, crime_classifications.crime_classification_name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no, cases.case_status AS case_status, users.name')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                            ->where('cases.case_unique_no', 'like', '%'.$case_no.'%')
                            ->get();

        return view('cases.case-all')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases)
                ->with('case_no', $case_no);
    }

    public function update_view($case_id) {
        $case = DB::table('user_cases')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->leftJoin('crime_locations', 'case_details.crime_location_id', '=', 'crime_locations.crime_location_id')
                            ->leftJoin('refregion', 'crime_locations.region_id', '=', 'refregion.regCode')
                            ->leftJoin('refprovince', 'crime_locations.province_id', '=', 'refprovince.provCode')
                            ->leftJoin('refcitymun', 'crime_locations.city_id', '=', 'refcitymun.citymunCode')
                            ->leftJoin('case_blotters', 'cases.case_blotter_id', '=', 'case_blotters.case_blotter_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->where('cases.case_id', '=', $case_id)
                            ->first();
        $crime_classifications = Crime_classification::all();
        $regions = DB::table('refregion')->get();
        $crime_categories = Crime_category::all();
        $crime_types = Crime_type::all();

        return view('cases.update-view')
                ->with('active_menu', '')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('crime_categories', $crime_categories)
                ->with('regions', $regions)
                ->with('case', $case);
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
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

        $crime_location = Crime_location::find($request->input('crime_location_id'));
        $crime_location->region_id = $request->input('region_id');
        $crime_location->province_id = $request->input('province_id');
        $crime_location->city_id = $request->input('city_id');
        $crime_location->home_address = $request->input('home_address');
        $crime_location->save();

        $offense = Offense::find($request->input('offense_id'));
        $offense->crime_category_id = $request->input('crime_category');
        $offense->detail = $request->input('offense_detail');
        $offense->save();

        $case_detail = Case_detail::find($request->input('case_detail_id'));
        $case_detail->offense_id = $offense->offense_id;
        $case_detail->crime_location_id = $crime_location->crime_location_id;
        $case_detail->crime_classification_id = $request->input('crime_classification');
        $case_detail->incident_at = $request->input('incident_at');
        $case_detail->save();

        $case_blotter = Case_blotter::find($request->input('case_blotter_id'));
        $case_blotter->entry_no = $request->input('entry_no');
        $case_blotter->reported_at = $request->input('reported_at');
        $case_blotter->save();

        $case = Casse::find($request->input('case_id'));
        $case->case_blotter_id = $case_blotter->case_blotter_id;
        $case->case_detail_id = $case_detail->case_detail_id;
        $case->case_status = $request->input('case_status');

        if ($case->save()) {

            session()->flash('status', true);
            return redirect()->route('case.show', ['case_id' => $request->input('case_id')]);
        } 

        session()->flash('status', false);
        return redirect()->route('home');
    }

    public function details($case_id) {
        $case = DB::table('user_cases')
                    ->select('cases.case_id', 'cases.case_unique_no', 'cases.case_status', 'case_blotters.entry_no', 'case_blotters.reported_at', 'crime_categories.crime_category_name', 'crime_classifications.crime_classification_name', 'crime_types.crime_type_name', 'offenses.detail', 'refregion.regDesc', 'refcitymun.citymunDesc', 'refprovince.provDesc', 'case_details.incident_at', 'crime_locations.home_address')
                    ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                    ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                    ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                    ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                    ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                    ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                    ->leftJoin('crime_locations', 'case_details.crime_location_id', '=', 'crime_locations.crime_location_id')
                    ->leftJoin('refregion', 'crime_locations.region_id', '=', 'refregion.regCode')
                    ->leftJoin('refprovince', 'crime_locations.province_id', '=', 'refprovince.provCode')
                    ->leftJoin('refcitymun', 'crime_locations.city_id', '=', 'refcitymun.citymunCode')
                    ->leftJoin('case_blotters', 'cases.case_blotter_id', '=', 'case_blotters.case_blotter_id')
                    ->where('user_cases.user_id', '=', Auth::user()->user_id)
                    ->where('cases.case_id', '=', $case_id)
                    ->first();

        $victims = DB::table('case_victims')
                        ->leftJoin('victims', 'case_victims.victim_id', '=', 'victims.victim_id')
                        ->where('case_victims.case_id', '=', $case_id)
                        ->get();
        $suspects = DB::table('case_suspects')
                        ->leftJoin('suspects', 'case_suspects.suspect_id', '=', 'suspects.suspect_id')
                        ->where('case_suspects.case_id', '=', $case_id)
                        ->get();
        $case_files = DB::table('case_folders')
                            ->where('case_id', '=', $case_id)
                            ->get();

        return view('cases.details')
                ->with('active_menu', '')
                ->with('active_submenu', '')
                ->with('case', $case)
                ->with('victims', $victims)
                ->with('suspects', $suspects)
                ->with('case_files', $case_files);
    }

    public function files_add_view($case_id) {
        return view('cases.files-add-view')
                ->with('active_menu', 'cases')
                ->with('active_submenu', '')
                ->with('case_id', $case_id);
    }

    public function files_add(Request $request) {
        $validator = Validator::make($request->all(), [
            'photoFile' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $dir = $request->input('case_id');

        if (is_dir($dir) === false){
            File::makeDirectory(public_path('case-files/'.$dir), $mode = 0777, true, true);
        }

        $image = $request->file('photoFile');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('case-files/' . $dir . '/' . $filename);
        Image::make($image->getRealPath())->resize(350, 300)->save($path);

        $case_folder = new Case_folder;
        $case_folder->case_id = $request->input('case_id');
        $case_folder->case_image = $filename;
        $case_folder->save();

        session()->flash('status', true);
        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function status_update(Request $request) {

        $case = Casse::find($request->input('case_id'));
        $case->case_status = 'closed';
        $case->save();

        session()->flash('status', true);
        return redirect()->route('case.all');

    }
}
