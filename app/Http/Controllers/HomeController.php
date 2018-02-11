<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Validator;

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
    public function list() 
    {
        $total_case = DB::table('cases')
                            ->count();
                            
        $latest_cases = DB::table('user_cases')
                            ->select('cases.case_unique_no AS case_unique_no', 'users.name as user_name')
                            ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->orderBy('user_cases.created_at', 'desc')
                            ->limit(5)
                            ->get();

        $cases = DB::table('cases')
                        ->leftJoin('user_cases', 'cases.case_id', '=', 'user_cases.case_id')
                        ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                        ->paginate(5);

        return view('home')
                ->with('active_menu', 'dashboard')
                ->with('active_submenu', '')
                ->with('latest_cases', $latest_cases)
                ->with('total_case', $total_case)
                ->with('cases', $cases);
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

    public function admin_search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'case_no' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $case_no = $request->input('case_no');

        $total_case = DB::table('cases')
                            ->count();
                            
        $latest_cases = DB::table('user_cases')
                            ->select('cases.case_unique_no AS case_unique_no', 'users.name as user_name')
                            ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                            ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->orderBy('user_cases.created_at', 'desc')
                            ->limit(5)
                            ->get();

        $cases = DB::table('cases')
                    ->leftJoin('user_cases', 'cases.case_id', '=', 'user_cases.case_id')
                    ->leftJoin('users', 'user_cases.user_id', '=', 'users.user_id')
                    ->where(function($query) use($case_no) {
                                $query->where('cases.case_unique_no', 'like', '%'.$case_no.'%');
                                $query->orWhere('users.name' , 'like', '%' . $case_no . '%');
                    }) 
                    ->paginate(5);

        return view('home')
                ->with('active_menu', 'case')
                ->with('active_submenu', '')
                ->with('cases', $cases)
                ->with('latest_cases', $latest_cases)
                ->with('total_case', $total_case)
                ->with('case_no', $case_no);
    }
}
