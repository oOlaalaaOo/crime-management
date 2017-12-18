<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use Auth;
use Hash;
use App\User;

class UserController extends Controller
{
    public function __construct() {

      

    }

   public function profile() {

   		$data = DB::table('users')
   						->where('user_id', '=', Auth::user()->user_id)
   						->first();

   		return view('profile')
   				   ->with('active_menu', 'account')
                  ->with('active_submenu', 'profile')
                  ->with('data', $data);
   }

   public function update_profile_details(Request $request) {
   		$username = $request->input('username');
   		$old_username = $request->input('old_username');
   		$name = $request->input('name');

   		if ($old_username == $username) {
   			$validator = Validator::make($request->all(), [
	   			'name' => 'required',
	   			'username' => 'required|email'
	   		]);
   		} else {
   			$validator = Validator::make($request->all(), [
	   			'name' => 'required',
	   			'username' => 'required|email|unique:users,username'
	   		]);
   		}

   		if ($validator->fails()) {
   			return redirect()->back()->withErrors($validator)->withInput();
   		}

   		$result = DB::table('users')
   					->where('user_id', '=', Auth::user()->user_id)
   					->update(['name' => $name, 'username' => $username]);
   		if ($result) {
   			session()->flash('status', true);
   			return redirect()->back();
   		}

   		session()->flash('status', false);
   		return redirect()->back();
   }

   public function update_profile_password(Request $request) {

   		$validator = Validator::make($request->all(), [
   			'old_password' => 'required',
   			'password' => 'required|confirmed'
   		]);

   		if ($validator->fails()) {
   			return redirect()->back()->withErrors($validator);
   		}

   		$user = DB::table('users')
					->where('user_id', '=', Auth::user()->user_id)
					->first();

		if (Hash::check($request->input('old_password'), $user->password)) {
			$result = DB::table('users')
						->where('user_id', '=', Auth::user()->user_id)
						->update(['password' => Hash::make($request->input('password'))]);

			if ($result) {
	   			session()->flash('status', true);
	   			return redirect()->back();
	   		}

	   		session()->flash('status', false);
	   		return redirect()->back();

		} else {

			return redirect()->back()->withErrors(['old_password' => 'Wrong Current Password']);
			
		}

		
   }

   public function all() {
      $users = DB::table('users')->where('user_type_id', '!=', 1)->get();
      $total_user_cases = DB::table('user_cases')->where('user_id', Auth::user()->user_id)->count();
      $ongoing_user_cases = DB::table('user_cases')
                              ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                              ->where('user_cases.user_id', Auth::user()->user_id)
                              ->where('cases.case_status', '=', 'ongoing')
                              ->count();
      $completed_user_cases = DB::table('user_cases')
                              ->leftJoin('cases', 'user_cases.case_id', '=', 'cases.case_id')
                              ->where('user_cases.user_id', Auth::user()->user_id)
                              ->where('cases.case_status', '=', 'completed')
                              ->count();

      return view('users.show-all')       
               ->with('active_menu', 'account')
               ->with('active_submenu', 'users')
               ->with('users', $users)
               ->with('total_user_cases', $total_user_cases)
               ->with('ongoing_user_cases', $ongoing_user_cases)
               ->with('completed_user_cases', $completed_user_cases);
   }

   public function add_view() {
      return view('users.add-view')
                  ->with('active_menu', 'account')
                  ->with('active_submenu', '');
   }

   public function add(Request $request) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'username' => 'required|email|unique:users,username',
         'password' => 'required|confirmed'
      ]);

      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = new User;
      $user->name = $request->name;
      $user->username = $request->username;
      $user->password = bcrypt($request->password);
      $user->status = 'active';
      $user->user_type_id = 2;
      $user->police_station_id = 1;

      if ($user->save()) {
         session()->flash('status', true);
         return redirect()->route('users.all');
      }

      session()->flash('status', false);

      return redirect()->route('users.all');
      
   }
}
