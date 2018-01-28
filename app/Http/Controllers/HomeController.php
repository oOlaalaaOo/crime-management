<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        $user_cases = DB::table('user_cases')
                            ->selectRaw('user_cases.*, crime_categories.crime_category_name AS crime_category, crime_types.crime_type_name AS crime_type, crime_classifications.crime_classification_name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->paginate(3);

        $total_case = DB::table('user_cases')
                            ->selectRaw('user_cases.*, crime_categories.crime_category_name AS crime_category, crime_types.crime_type_name AS crime_type, crime_classifications.crime_classification_name AS crime_classification, case_details.incident_at AS incident_at, cases.case_unique_no AS case_no')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->leftJoin('case_details', 'cases.case_detail_id', '=', 'case_details.case_detail_id')
                            ->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
                            ->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
                            ->leftJoin('crime_categories', 'offenses.crime_category_id', '=', 'crime_categories.crime_category_id')
                            ->leftJoin('crime_types', 'crime_categories.crime_type_id', '=', 'crime_types.crime_type_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->count();
                            
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
                ->with('latest_cases', $latest_cases)
                ->with('total_case', $total_case);
    }

    public function case_per_year(Request $request)
    {
        $years = DB::table('cases')
                        ->selectRaw('DISTINCT(YEAR(created_at)) as years')
                        ->get();
        
        $result = [];

        foreach ($years as $year)
        {
            $result[$year][] = DB::table('cases')->where(DB::raw('YEAR(created_at)'), '=', $year)->count();
        }

        return $result;
    }
}
