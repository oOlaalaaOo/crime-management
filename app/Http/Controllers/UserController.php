<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use Auth;
use Hash;

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
   			session()->flash('status', 'Successfully updated!');
   			return redirect()->back();
   		}

   		session()->flash('status', 'Error, Something went wrong!');
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
	   			session()->flash('status', 'Successfully updated!');
	   			return redirect()->back();
	   		}

	   		session()->flash('status', 'Error, Something went wrong!');
	   		return redirect()->back();

		} else {

			return redirect()->back()->withErrors(['old_password' => 'Wrong Current Password']);
			
		}

		
   }
}
