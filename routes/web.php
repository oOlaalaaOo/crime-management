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

Route::get('crime/get-crime-offenses/{crime_category_id}', function($crime_category_id) {
	$crime_categories = [];
	if ($crime_category_id != '') {
		$offenses = \DB::table('offenses')->where('crime_category_id', $crime_category_id)->get();
		return response()->json(['offenses' => $offenses]);
	}
	return response()->json(['crime_categories' => $crime_categories]);
	
});

Route::get('case/add', 'CaseController@add_view')->name('case.add.view');
Route::post('case/add', 'CaseController@add')->name('case.add');
Route::get('case/add-crime/{case_id}', 'CaseController@add_crime_view')->name('case.add-crime-view');
Route::post('case/add-crime', 'CaseController@add_crime')->name('case.add-crime');
Route::get('case/update/{case_id}', 'CaseController@update_view')->name('case.update.view');
Route::post('case/update', 'CaseController@update')->name('case.update');
Route::get('case/all', 'CaseController@all')->name('case.all');
Route::get('case/details/{case_id}', 'CaseController@details')->name('case.details');
Route::get('case/search', 'CaseController@search')->name('case.search');
Route::get('case/files/add/{case_id}', 'CaseController@files_add_view')->name('case.files.add.view');
Route::post('case/files/add', 'CaseController@files_add')->name('case.files.add');
Route::post('case/status/update', 'CaseController@status_update')->name('case.status.update');
Route::get('case/admin-search', 'HomeController@admin_search')->name('case.admin-search');

Route::get('victim/all', 'VictimController@all')->name('victim.all');
Route::get('victim/search', 'VictimController@search')->name('victim.search');
Route::get('victim/add/{case_id}', 'VictimController@add_view')->name('victim.add.view');
Route::post('victim/add', 'VictimController@add')->name('victim.add');
Route::post('victim/add-exist', 'VictimController@add_exist')->name('victim.add.exist');
Route::get('victim/update/{victim_id}', 'VictimController@update_view')->name('victim.update.view');
Route::post('victim/update', 'VictimController@update')->name('victim.update');

Route::get('suspect/all', 'SuspectController@all')->name('suspect.all');
Route::get('suspect/search', 'SuspectController@search')->name('suspect.search');
Route::get('suspect/add/{case_id}', 'SuspectController@add_view')->name('suspect.add.view');
Route::post('suspect/add', 'SuspectController@add')->name('suspect.add');
Route::post('suspect/add-exist', 'SuspectController@add_exist')->name('suspect.add.exist');
Route::get('suspect/update/{suspect_id}', 'SuspectController@update_view')->name('suspect.update.view');
Route::post('suspect/update', 'SuspectController@update')->name('suspect.update');

Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::post('user/update/profile/details', 'UserController@update_profile_details')->name('user.update.profile.details');
Route::post('user/update/profile/password', 'UserController@update_profile_password')->name('user.update.profile.password');
Route::get('users/all', 'UserController@all')->name('users.all');
Route::get('users/add', 'UserController@add_view')->name('users.add.view');
Route::post('users/add', 'UserController@add')->name('users.add');
Route::get('users/show/{user_id}', 'UserController@show')->name('users.show');
Route::post('users/update', 'UserController@update')->name('users.update');

Route::get('users/add-city-director', 'UserController@add_city_director_view')->name('users.add-city-director.view');
Route::post('users/add-city-director', 'UserController@add_city_director')->name('users.add-city-director');

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

Route::get('rank/all', 'RankController@all')->name('rank.all');
Route::get('rank/show/{rank_id}', 'RankController@show')->name('rank.show');
Route::get('rank/add', 'RankController@add_view')->name('rank.add.view');
Route::post('rank/add', 'RankController@add')->name('rank.add');
Route::post('rank/update', 'RankController@update')->name('rank.update');

Route::get('/chart/case-per-year', 'HomeController@case_per_year')->name('chart.case-per-year');


Route::get('crime/offense/all', 'OffenseController@all')->name('crime.offense.all');
Route::get('crime/offense/add', 'OffenseController@add_view')->name('crime.offense.add.view');
Route::post('crime/offense/add', 'OffenseController@add')->name('crime.offense.add');
Route::get('crime/offense/update/{offense_id}', 'OffenseController@update_view')->name('crime.offense.update.view');
Route::post('crime/offense/update', 'OffenseController@update')->name('crime.offense.update');
Route::post('crime/offense/delete', 'OffenseController@delete')->name('crime.offense.delete');

Route::get('stations/all', 'StationController@all')->name('stations.all');
Route::get('stations/show/{station_id}', 'StationController@show')->name('stations.show');
Route::get('stations/add', 'StationController@add_view')->name('stations.add.view');
Route::post('stations/add', 'StationController@add')->name('stations.add');
Route::post('stations/update', 'StationController@update')->name('stations.update');

Route::get('blotter/all', 'BlotterController@all')->name('blotter.all');
Route::get('blotter/show/{blotter_id}', 'BlotterController@show')->name('blotter.show');
Route::get('blotter/add', 'BlotterController@add_view')->name('blotter.add.view');
Route::post('blotter/add', 'BlotterController@add')->name('blotter.add');
Route::post('blotter/update', 'BlotterController@update')->name('blotter.update');
Route::get('blotter/view/{blotter_id}', 'BlotterController@view')->name('blotter.view');

Route::get('reports/daily', 'ReportController@daily')->name('reports.daily');
Route::get('reports/monthly', 'ReportController@monthly')->name('reports.monthly');
Route::get('reports/yearly', 'ReportController@yearly')->name('reports.yearly');

Route::get('reports/daily-view', 'ReportController@daily_view')->name('reports.daily-view');
Route::get('reports/monthly-view', 'ReportController@monthly_view')->name('reports.monthly-view');
Route::get('reports/yearly-view', 'ReportController@yearly_view')->name('reports.yearly-view');