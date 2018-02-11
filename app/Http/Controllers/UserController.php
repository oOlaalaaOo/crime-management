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
      $officers = DB::table('users')
                        ->leftJoin('ranks', 'users.rank_id', '=', 'ranks.rank_id')
                        ->leftJoin('police_stations', 'users.police_station_id', '=', 'police_stations.police_station_id')
                        ->where('user_type_id', 2)
                        ->paginate(5);

      $directors = DB::table('users')
                        ->where('user_type_id', 3)
                        ->paginate(5);

      return view('users.show-all')       
               ->with('active_menu', 'account')
               ->with('active_submenu', 'users')
               ->with('officers', $officers)
               ->with('directors', $directors);
   }

   public function add_view() {

      $ranks = \App\Rank::all();
      $stations = \App\Police_station::all();
      return view('users.add-view')
                  ->with('active_menu', 'account')
                  ->with('active_submenu', '')
                  ->with('ranks', $ranks)
                  ->with('stations', $stations);
   }

   public function add_city_director_view() 
   {
      return view('users.add-city-director')
                  ->with('active_menu', 'account')
                  ->with('active_submenu', '');
   }

   public function add(Request $request) 
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'username' => 'required|email|unique:users,username',
         'password' => 'required|confirmed',
         'user_rank_id' => 'required'
      ]);

      if ($validator->fails()) 
      {
         return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = new User;
      $user->name = $request->name;
      $user->username = $request->username;
      $user->password = bcrypt($request->password);
      $user->status = 'active';
      $user->user_type_id = 2;
      $user->police_station_id = 1;
      $user->rank_id = $request->input('user_rank_id');

      if ($user->save()) 
      {
         session()->flash('status', true);
      }
      else
      {
         session()->flash('status', false);
      }

      return redirect()->route('users.all');
   }

   public function add_city_director(Request $request) 
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'username' => 'required|email|unique:users,username',
         'password' => 'required|confirmed',
      ]);

      if ($validator->fails()) 
      {
         return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = new User;
      $user->name = $request->name;
      $user->username = $request->username;
      $user->password = bcrypt($request->password);
      $user->status = 'active';
      $user->user_type_id = 3;
      $user->police_station_id = 0;
      $user->rank_id = 0;

      if ($user->save()) 
      {
         session()->flash('status', true);
      }
      else
      {
         session()->flash('status', false);
      }

      return redirect()->route('users.all');
      
   }

   public function show($user_id)
   {
      $user = \App\User::find($user_id);
      $ranks = \App\Rank::all();
      $stations = \App\Police_station::all();

      return view('users.show')
               ->with('active_menu', 'users')
               ->with('active_submenu', '')
               ->with('user', $user)
               ->with('ranks', $ranks)
               ->with('stations', $stations);
   }

   public function update(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
      ]);

      if ($validator->fails())
      {
         return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = \App\User::find($request->input('user_id'));
      $user->name = $request->input('name');
      $user->rank_id = $request->input('user_rank_id');
      $user->status = $request->has('user_status') == true ? 'active' : 'inactive';
      $user->police_station_id = $request->input('station_id');

      if ($user->save())
      {
         session()->flash('status', true);
      }
      else
      {
         session()->flash('status', false);
      }

      return redirect()->route('users.all');
   }
}
