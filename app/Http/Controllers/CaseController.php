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
use App\CrimeCoordinate;

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
        $offeses = DB::table('offenses')->get();

    	return view('cases.add-view')
    			->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('regions', $regions);
    }

    public function add_crime_view($case_id) {
        $crime_classifications = Crime_classification::all();
        $regions = DB::table('refregion')->get();
        $crime_categories = Crime_category::all();
        $crime_types = Crime_type::all();
        $offeses = DB::table('offenses')->get();

        return view('cases.add-crime-view')
                ->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('regions', $regions)
                ->with('case_id', $case_id);
    }

    public function add(Request $request) {

    	$validator = Validator::make($request->all(), [
    		'crime_classification' => 'required',
    		'home_address'        => 'required',
    		'incident_at'         => 'required|date_format:"Y-m-d"',
    		'crime_type'          => 'required',
    		'crime_category'      => 'required',
            'offense'               => 'required',
            'lat'                   => 'nullable|numeric',
    		'long'                  => 'nullable|numeric',
    	]);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

        // $url = 'https://maps.googleapis.com/maps/api/geocode/json?';
        // $data = [
        //     'address' => $province->provDesc . ', ' . $city->citymunDesc . ', ' . $request->input('home_address'),
        //     'key'   => 'AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0'
        // ];
        // $params = http_build_query($data);
        // $main_url = $url . $params;

        // $ch = curl_init(); 
        // curl_setopt($ch, CURLOPT_URL, $main_url); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        // curl_setopt($ch,CURLOPT_HEADER, false); 
        // $result = curl_exec($ch); 
        // curl_close($ch);
        // $result = json_decode($result, true);

        $case = new Casse;
        $case->case_unique_no = time();
        $case->case_status = 'ongoing';
        $case->save();

        $crime_location = new Crime_location;
        $crime_location->region_id = 10;
        $crime_location->province_id = 1043;
        $crime_location->city_id = 104305;
        $crime_location->home_address = $request->input('home_address');
        $crime_location->save();

        $case_detail = new Case_detail;
        $case_detail->case_id = $case->case_id;
        $case_detail->crime_location_id = $crime_location->crime_location_id;
        $case_detail->crime_classification_id = $request->input('crime_classification');
        $case_detail->crime_type_id = $request->input('crime_type');
        $case_detail->crime_category_id = $request->input('crime_category');
        $case_detail->offense_id = $request->input('offense');
        $case_detail->incident_at = $request->input('incident_at');
        $case_detail->save();

        $crime_coordinate = new CrimeCoordinate;
        $crime_coordinate->crime_coordinate_lat = $request->input('lat');
        $crime_coordinate->crime_coordinate_long = $request->input('long');
        $crime_coordinate->case_detail_id = $case_detail->case_detail_id;
        $crime_coordinate->save();

        $user_case = new User_case;
        $user_case->user_id = Auth::user()->user_id;
        $user_case->case_id = $case->case_id;
        $user_case->save();

        session()->flash('status', true);

        return redirect()->route('case.details', ['case_id' => $case->case_id]);
    }

    public function add_crime(Request $request) {

        $validator = Validator::make($request->all(), [
            'crime_classification' => 'required',
            'home_address'        => 'required',
            'incident_at'         => 'required|date_format:"Y-m-d"',
            'crime_type'          => 'required',
            'crime_category'      => 'required',
            'offense'               => 'required',
            'lat'                   => 'nullable|numeric',
            'long'                  => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $url = 'https://maps.googleapis.com/maps/api/geocode/json?';
        // $data = [
        //     'address' => $province->provDesc . ', ' . $city->citymunDesc . ', ' . $request->input('home_address'),
        //     'key'   => 'AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0'
        // ];
        // $params = http_build_query($data);
        // $main_url = $url . $params;

        // $ch = curl_init(); 
        // curl_setopt($ch, CURLOPT_URL, $main_url); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        // curl_setopt($ch,CURLOPT_HEADER, false); 
        // $result = curl_exec($ch); 
        // curl_close($ch);
        // $result = json_decode($result, true);
        
        

        $crime_location = new Crime_location;
        $crime_location->region_id = 10;
        $crime_location->province_id = 1043;
        $crime_location->city_id = 104305;
        $crime_location->home_address = $request->input('home_address');
        $crime_location->save();

        $case_detail = new Case_detail;
        $case_detail->case_id = $request->input('case_id');
        $case_detail->crime_location_id = $crime_location->crime_location_id;
        $case_detail->crime_classification_id = $request->input('crime_classification');
        $case_detail->crime_type_id = $request->input('crime_type');
        $case_detail->crime_category_id = $request->input('crime_category');
        $case_detail->offense_id = $request->input('offense');
        $case_detail->incident_at = $request->input('incident_at');
        $case_detail->save();

        $crime_coordinate = new CrimeCoordinate;
        $crime_coordinate->crime_coordinate_lat = $request->input('lat');
        $crime_coordinate->crime_coordinate_long = $request->input('long');
        $crime_coordinate->case_detail_id = $case_detail->case_detail_id;
        $crime_coordinate->save();

        session()->flash('status', true);

        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function all() {

        $cases = DB::table('user_cases')
                        ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                        ->where('user_cases.user_id', '=', Auth::user()->user_id)
                        ->paginate(5);

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
                    ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                    ->where('user_cases.user_id', '=', Auth::user()->user_id)
                    ->where('cases.case_unique_no', 'like', '%'.$case_no.'%')
                    ->paginate(5);

        return view('cases.show-all')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases)
                ->with('case_no', $case_no);
    }

    public function update_view($case_id) {
        $case = DB::table('user_cases')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_id', '=', 'case_details.case_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'case_details.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'case_details.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->leftJoin('crime_locations', 'case_details.crime_location_id', '=', 'crime_locations.crime_location_id')
                            ->leftJoin('crime_coordinates', 'case_details.case_detail_id', '=', 'crime_coordinates.case_detail_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->where('cases.case_id', '=', $case_id)
                            ->first();

        $crime_classifications = DB::table('crime_classifications')->get();
        $crime_categories = DB::table('crime_categories')->get();
        $crime_types = DB::table('crime_types')->get();
        $offenses = DB::table('offenses')->get();

        return view('cases.update-view')
                ->with('active_menu', '')
                ->with('active_submenu', '')
                ->with('crime_classifications', $crime_classifications)
                ->with('crime_types', $crime_types)
                ->with('crime_categories', $crime_categories)
                ->with('offenses', $offenses)
                ->with('case', $case);
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'crime_classification' => 'required',
            'home_address'        => 'required',
            'incident_at'         => 'required|date_format:"Y-m-d"',
            'crime_type'          => 'required',
            'crime_category'      => 'required',
            'offense'               => 'required',
            'lat'                   => 'nullable|numeric',
            'long'                  => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('case.add.view')->withErrors($validator)->withInput();
        }

        $crime_location = Crime_location::find($request->input('crime_location_id'));
        $crime_location->home_address = $request->input('home_address');
        $crime_location->save();
        
        $case_detail = Case_detail::find($request->input('case_detail_id'));
        $case_detail->crime_classification_id = $request->input('crime_classification');
        $case_detail->crime_type_id = $request->input('crime_type');
        $case_detail->crime_category_id = $request->input('crime_category');
        $case_detail->offense_id = $request->input('offense');
        $case_detail->incident_at = $request->input('incident_at');
        $case_detail->save();

        $crime_coordinate = CrimeCoordinate::find($request->input('crime_coordinate_id'));
        $crime_coordinate->crime_coordinate_lat = $request->input('lat');
        $crime_coordinate->crime_coordinate_long = $request->input('long');
        $crime_coordinate->save();

        session()->flash('status', true);
        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function details($case_id) {
        $case = DB::table('user_cases')
                    ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                    ->where('user_cases.user_id', '=', Auth::user()->user_id)
                    ->where('cases.case_id', '=', $case_id)
                    ->first();

        $case_details = DB::table('user_cases')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_id', '=', 'case_details.case_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'case_details.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'case_details.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->leftJoin('crime_locations', 'case_details.crime_location_id', '=', 'crime_locations.crime_location_id')
                            ->leftJoin('refcitymun', 'crime_locations.city_id', '=', 'refcitymun.citymunCode')
                            ->leftJoin('crime_coordinates', 'case_details.case_detail_id', '=', 'crime_coordinates.case_detail_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->where('cases.case_id', '=', $case_id)
                            ->get();

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
                ->with('case_details', $case_details)
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
