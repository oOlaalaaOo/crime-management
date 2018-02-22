<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use Auth;

class ReportController extends Controller
{
    public function __construct() {

    }

    public function index() {
    	return view('report')
    			->with('active_menu', 'reports')
                ->with('active_submenu', '');
    }

    public function monthly(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datepicker' => 'required' 
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
    	$datepicker = $request->input('datepicker');

    	$cDates = DB::table('cases')
    					->selectRaw('DISTINCT(MONTH(created_at)) as cDate')
    					->whereYear('created_at', '=', $datepicker)
    					->get();

    	$cases = [];
    	
    	foreach($cDates as $d)
    	{	
    		$cases[$d->cDate] = DB::table('user_cases')
    								->leftJoin('cases', 'cases.case_id', '=', 'user_cases.case_id')
    								->leftJoin('users', 'users.user_id', '=', 'user_cases.user_id')
    								->whereMonth('user_cases.created_at', '=', $d->cDate)
    								->get(); 
    		
    	}

    	$case_details = [];
    	foreach ($cDates as $d)
    	{
    		foreach($cases[$d->cDate] as $ckey => $cvalue)
	    	{
	    		$case_details[$cvalue->case_id] = DB::table('case_details')
	    												->leftJoin('crime_types', 'case_details.crime_type_id', '=', 'crime_types.crime_type_id')
	    												->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
	    												->leftJoin('crime_categories', 'case_details.crime_category_id', '=', 'crime_categories.crime_category_id')
	    												->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
	    												->where('case_id', $cvalue->case_id)->get();
	    	}
    	}
    	

    	return view('reports.monthly')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_monthly')
                ->with('cDates', $cDates)
                ->with('cases', $cases)
                ->with('case_details', $case_details);
    }

    public function yearly(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datepicker' => 'required', 
            'datepicker2' => 'required', 
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$datepicker = $request->input('datepicker');
    	$datepicker2 = $request->input('datepicker2');

    	$cDates = DB::table('cases')
    					->selectRaw('DISTINCT(YEAR(created_at)) as cDate')
    					->whereYear('created_at', '>=', $datepicker)
    					->whereYear('created_at', '<=', $datepicker2)
    					->get();

    	$cases = [];
    	
    	foreach($cDates as $d)
    	{	
    		$cases[$d->cDate] = DB::table('user_cases')
    								->leftJoin('cases', 'cases.case_id', '=', 'user_cases.case_id')
    								->leftJoin('users', 'users.user_id', '=', 'user_cases.user_id')
    								->whereYear('user_cases.created_at', '=', $d->cDate)
    								->get(); 
    		
    	}

    	$case_details = [];
    	foreach ($cDates as $d)
    	{
    		foreach($cases[$d->cDate] as $ckey => $cvalue)
	    	{
	    		$case_details[$cvalue->case_id] = DB::table('case_details')
	    												->leftJoin('crime_types', 'case_details.crime_type_id', '=', 'crime_types.crime_type_id')
	    												->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
	    												->leftJoin('crime_categories', 'case_details.crime_category_id', '=', 'crime_categories.crime_category_id')
	    												->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
	    												->where('case_id', $cvalue->case_id)->get();
	    	}
    	}
    	

    	return view('reports.yearly')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_yearly')
                ->with('cDates', $cDates)
                ->with('cases', $cases)
                ->with('case_details', $case_details);
    }

    public function daily(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datepicker' => 'required' 
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$dates = explode(' - ', $request->datepicker);

    	$cDates = DB::table('cases')
    					->selectRaw('DISTINCT(DATE(created_at)) as cDate')
    					->whereDate('created_at', '>=', $dates[0])
    					->whereDate('created_at', '<=', $dates[1])
    					->get();
    	
    	$cases = [];
    	
    	foreach($cDates as $d)
    	{	
    		$cases[$d->cDate] = DB::table('user_cases')
    								->leftJoin('cases', 'cases.case_id', '=', 'user_cases.case_id')
    								->leftJoin('users', 'users.user_id', '=', 'user_cases.user_id')
    								->whereDate('user_cases.created_at', '=', $d->cDate)
    								->get(); 
    		
    	}

    	$case_details = [];
    	foreach ($cDates as $d)
    	{
    		foreach($cases[$d->cDate] as $ckey => $cvalue)
	    	{
	    		$case_details[$cvalue->case_id] = DB::table('case_details')
	    												->leftJoin('crime_types', 'case_details.crime_type_id', '=', 'crime_types.crime_type_id')
	    												->leftJoin('crime_classifications', 'case_details.crime_classification_id', '=', 'crime_classifications.crime_classification_id')
	    												->leftJoin('crime_categories', 'case_details.crime_category_id', '=', 'crime_categories.crime_category_id')
	    												->leftJoin('offenses', 'case_details.offense_id', '=', 'offenses.offense_id')
	    												->where('case_id', $cvalue->case_id)->get();
	    	}
    	}
    	
        // $types = DB::table('crime_types')->get();
        // $classifications = DB::table('crime_classifications')->get();
        // $offenses = DB::table('offenses')->get();
        // $categories = DB::table('crime_categories')->get();
        // return response()->json([
        //     'cDates' => $cDates, 
        //     'cases' => $cases, 
        //     'case_details' => $case_details,
        //     'types' => $types,
        //     'classifications' => $classifications,
        //     'offenses' => $offenses,
        //     'categories' => $categories
        // ]);

    	return view('reports.daily')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_daily')
                ->with('cDates', $cDates)
                ->with('cases', $cases)
                ->with('case_details', $case_details);
    }

    public function monthly_view()
    {
    	return view('reports.monthly')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_monthly');
    }

    public function yearly_view()
    {
    	return view('reports.yearly')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_yearly');
    }

    public function daily_view()
    {
    	return view('reports.daily')
    			->with('active_menu', 'reports')
                ->with('active_submenu', 'report_daily');
    }

    public function user_logs_view()
    {
        return view('reports.user-logs')
                ->with('active_menu', 'reports')
                ->with('active_submenu', 'user_logs');
    }

    public function user_logs(Request $request)
    {
        $dates = explode(' - ', $request->datepicker);

        $user_logs = \App\User_log::where('created_at', '>=' ,$dates[0])
                                    ->where('created_at', '<=', $dates[1])
                                    ->get();

        return view('reports.user-logs')
                ->with('active_menu', 'reports')
                ->with('active_submenu', 'user_logs')
                ->with('user_logs', $user_logs);
                
    }
}
