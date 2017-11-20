<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

class SuspectController extends Controller
{
    public function __construct() {

    }

    public function all() {
    	$suspects = DB::table('case_suspects')                         
                            ->leftJoin('suspects', 'case_suspects.suspect_id', '=', 'suspects.suspect_id')
                            ->paginate(5);

        return view('suspects')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('suspects', $suspects);
    }

    public function search(Request $request) {
        $name = $request->input('name');

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suspects = DB::table('case_suspects')                         
                            ->leftJoin('suspects', 'case_suspects.suspect_id', '=', 'suspects.suspect_id')
                            ->where('suspects.name', 'like', '%'.$name.'%')
                            ->paginate(5);

        return view('suspects')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('suspects', $suspects)
                ->with('name', $name);
    }
}
