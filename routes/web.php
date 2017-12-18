<?php

Route::get('/', function () {
    return view('auth.login')
    		->with('active_menu', 'dashboard')
            ->with('active_submenu', '');
});

Auth::routes();

Route::get('home', 'HomeController@list')->name('home');


Route::get('location/get_provinces/{region_code}', function($region_code) {
	$provinces = \DB::table('refprovince')->where('regCode', '=', $region_code)->get();

	return response()->json(['provinces' => $provinces]);
});

Route::get('location/get_cities/{province_code}', function($province_code) {
	$cities = \DB::table('refcitymun')->where('provCode', '=', $province_code)->get();

	return response()->json(['cities' => $cities]);
});

Route::get('crime/get-crime-categories/{crime_type_id}', function($crime_type_id) {
	$crime_categories = [];
	if ($crime_type_id != '') {
		$crime_categories = \App\Crime_category::where('crime_type_id', '=', $crime_type_id)->get();
		return response()->json(['crime_categories' => $crime_categories]);
	}
	return response()->json(['crime_categories' => $crime_categories]);
	
});

Route::get('case/add', 'CaseController@add_view')->name('case.add.view');
Route::post('case/add', 'CaseController@add')->name('case.add');
Route::get('case/update/{case_id}', 'CaseController@update_view')->name('case.update.view');
Route::post('case/update', 'CaseController@update')->name('case.update');
Route::get('case/all', 'CaseController@all')->name('case.all');
Route::get('case/details/{case_id}', 'CaseController@details')->name('case.details');
Route::get('case/search', 'CaseController@search')->name('case.search');
Route::get('case/files/add/{case_id}', 'CaseController@files_add_view')->name('case.files.add.view');
Route::post('case/files/add', 'CaseController@files_add')->name('case.files.add');
Route::post('case/status/update', 'CaseController@status_update')->name('case.status.update');

Route::get('victim/all', 'VictimController@all')->name('victim.all');
Route::get('victim/search', 'VictimController@search')->name('victim.search');
Route::get('victim/add/{case_id}', 'VictimController@add_view')->name('victim.add.view');
Route::post('victim/add', 'VictimController@add')->name('victim.add');
Route::get('victim/update/{victim_id}/{case_id}', 'VictimController@update_view')->name('victim.update.view');
Route::post('victim/update', 'VictimController@update')->name('victim.update');

Route::get('suspect/all', 'SuspectController@all')->name('suspect.all');
Route::get('suspect/search', 'SuspectController@search')->name('suspect.search');
Route::get('suspect/add/{case_id}', 'SuspectController@add_view')->name('suspect.add.view');
Route::post('suspect/add', 'SuspectController@add')->name('suspect.add');
Route::get('suspect/update/{suspect_id}/{case_id}', 'SuspectController@update_view')->name('suspect.update.view');
Route::post('suspect/update', 'SuspectController@update')->name('suspect.update');

Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::post('user/update/profile/details', 'UserController@update_profile_details')->name('user.update.profile.details');
Route::post('user/update/profile/password', 'UserController@update_profile_password')->name('user.update.profile.password');
Route::get('users/all', 'UserController@all')->name('users.all');
Route::get('users/add', 'UserController@add_view')->name('users.add.view');
Route::post('users/add', 'UserController@add')->name('users.add');

Route::get('crime/type/all', 'CrimeTypeController@all')->name('crime.type.all');
Route::get('crime/type/add', 'CrimeTypeController@add_view')->name('crime.type.add.view');
Route::post('crime/type/add', 'CrimeTypeController@add')->name('crime.type.add');
Route::get('crime/type/update/{crime_type_id}', 'CrimeTypeController@update_view')->name('crime.type.update.view');
Route::post('crime/type/update', 'CrimeTypeController@update')->name('crime.type.update');
Route::post('crime/type/delete', 'CrimeTypeController@delete')->name('crime.type.delete');

Route::get('crime/category/all', 'CrimeCategoryController@all')->name('crime.category.all');
Route::get('crime/category/add', 'CrimeCategoryController@add_view')->name('crime.category.add.view');
Route::post('crime/category/add', 'CrimeCategoryController@add')->name('crime.category.add');
Route::get('crime/category/update/{crime_category_id}', 'CrimeCategoryController@update_view')->name('crime.category.update.view');
Route::post('crime/category/update', 'CrimeCategoryController@update')->name('crime.category.update');
Route::post('crime/category/delete', 'CrimeCategoryController@delete')->name('crime.category.delete');

Route::get('crime/classification/all', 'CrimeClassificationController@all')->name('crime.classification.all');
Route::get('crime/classification/add', 'CrimeClassificationController@add_view')->name('crime.classification.add.view');
Route::post('crime/classification/add', 'CrimeClassificationController@add')->name('crime.classification.add');
Route::get('crime/classification/update/{crime_classification_id}', 'CrimeClassificationController@update_view')->name('crime.classification.update.view');
Route::post('crime/classification/update', 'CrimeClassificationController@update')->name('crime.classification.update');
Route::post('crime/classification/delete', 'CrimeClassificationController@delete')->name('crime.classification.delete');

Route::get('reports', 'ReportController@index')->name('reports');