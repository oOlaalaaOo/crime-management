<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
    	$url = 'https://maps.googleapis.com/maps/api/geocode/json?';
    	$data = [
    		'address' => 'Mabuhay Extension, Carmen, Cagayan de Oro City',
    		'key'	=> 'AIzaSyA4g5tTbLP8pq1P6W0VtAc7TY8bMcc3Mm0'
    	];
    	$params = http_build_query($data);
    	$main_url = $url . $params;

    	$ch = curl_init(); 
    	curl_setopt($ch, CURLOPT_URL, $main_url); 
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    	curl_setopt($ch,CURLOPT_HEADER, false); 
    	$result = curl_exec($ch); 
    	curl_close($ch);

    	$result = json_decode($result, true);

    	return $result;
    }
}
