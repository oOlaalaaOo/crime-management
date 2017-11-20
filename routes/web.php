<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login')
    		->with('active_menu', 'dashboard')
            ->with('active_submenu', '');
});

Auth::routes();

Route::get('/home', 'CaseController@list')->name('home');
Route::get('/case/add/view', 'CaseController@add_view')->name('case.add.view');
Route::post('/case/add', 'CaseController@add')->name('case.add');
Route::get('/case/all', 'CaseController@all')->name('case.all');

Route::get('/location/get_provinces/{region_code}', function($region_code) {
	$provinces = \DB::table('refprovince')->where('regCode', '=', $region_code)->get();

	return response()->json(['provinces' => $provinces]);
});

Route::get('/location/get_cities/{province_code}', function($province_code) {
	$cities = \DB::table('refcitymun')->where('provCode', '=', $province_code)->get();

	return response()->json(['cities' => $cities]);
});

Route::get('/crime/get-crime-categories/{crime_type_id}', function($crime_type_id) {
	$crime_categories = [];
	if ($crime_type_id != '') {
		$crime_categories = \App\Crime_category::where('crime_type_id', '=', $crime_type_id)->get();
		return response()->json(['crime_categories' => $crime_categories]);
	}
	return response()->json(['crime_categories' => $crime_categories]);
	
});

Route::get('case/list', 'CaseController@list')->name('case.list');
Route::get('victim/all', 'VictimController@all')->name('victim.all');
Route::get('suspect/all', 'SuspectController@all')->name('suspect.all');
Route::get('case/search', 'CaseController@search')->name('case.search');
Route::get('suspect/search', 'SuspectController@search')->name('suspect.search');
Route::get('victim/search', 'VictimController@search')->name('victim.search');
Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::post('user/update/profile/details', 'UserController@update_profile_details')->name('user.update.profile.details');
Route::post('user/update/profile/password', 'UserController@update_profile_password')->name('user.update.profile.password');

Route::get('reports', 'ReportController@index')->name('reports');