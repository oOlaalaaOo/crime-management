<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct() {

    }

    public function index() {
    	return view('report')
    			->with('active_menu', 'reports')
                ->with('active_submenu', '');
    }
}
