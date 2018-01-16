<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Rank;

class RankController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {
    	$ranks = Rank::paginate(10);

    	return view('ranks.all')
    			->with('active_menu', 'rank')
                ->with('active_submenu', '')
    			->with('ranks', $ranks);

    }

    public function add_view()
    {
    	return view('ranks.add')
    			->with('active_menu', 'rank')
                ->with('active_submenu', '');
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'code' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$rank = new Rank;
    	$rank->code = $request->input('code');
    	$rank->description = $request->input('description');

    	if ($rank->save())
    	{
    		session()->flash('status', true);
    	}
    	else
    	{
    		session()->flash('status', false);
    	}

    	return redirect()->route('rank.all');
    }

    public function show($rank_id, Request $request)
    {
    	$rank = Rank::find($rank_id);

    	return view('ranks.show')
    			->with('active_menu', 'rank')
                ->with('active_submenu', '')
                ->with('rank', $rank);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'code' => 'required'
    	]);

    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$rank = Rank::find($request->input('rank_id'));
    	$rank->code = $request->input('code');
    	$rank->description = $request->input('description');

    	if ($rank->save())
    	{
    		session()->flash('status', true);
    	}
    	else
    	{
    		session()->flash('status', false);
    	}

    	return redirect()->route('rank.all');
    }
}
