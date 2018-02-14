<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use Auth;
use App\Libraries\Userlog;

class BlotterController extends Controller
{
    protected $userlog;

    public function __construct(Userlog $ul)
    {
        $this->userlog = $ul;
    }

    public function all()
    {
    	$blotters = DB::table('blotters')
    					->paginate(5);

    	return view('blotter.all')
    			->with('active_menu', 'blotter')
                ->with('active_submenu', '')
    			->with('blotters', $blotters);
    }

    public function add_view()
    {
    	return view('blotter.add')
    			->with('active_menu', 'blotter')
                ->with('active_submenu', '');
    }

    public function add(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required',
    		'content' => 'required',
    		'complainant_name' => 'required',
    		'complainant_address' => 'required',
    		'complainant_contact_no' => 'required'
     	]);

     	if ($validator->fails())
     	{
     		return redirect()->back()->withErrors($validator)->withInput();
     	}

     	$blotter = new \App\Blotter;

     	$blotter->blotter_title = $request->input('title');
     	$blotter->blotter_content = $request->input('content');
     	$blotter->complainant_name = $request->input('complainant_name');
     	$blotter->complainant_address = $request->input('complainant_address');
     	$blotter->complainant_contact_no = $request->input('complainant_contact_no');

     	if ($blotter->save())
     	{
            $this->userlog->add(Auth::user()->user_id, 'Added Blotter ID:'. $blotter->blotter_id);
     		session()->flash('status', true);
     	}
     	else
     	{
     		session()->flash('status', false);
     	}

     	return redirect()->route('blotter.all');
    }

    public function show($blotter_id)
    {
    	$blotter = \App\Blotter::find($blotter_id);

    	return view('blotter.show')
    			->with('active_menu', 'blotter')
                ->with('active_submenu', '')
                ->with('blotter', $blotter);
    }

    public function view($blotter_id)
    {
    	$blotter = \App\Blotter::find($blotter_id);

    	return view('blotter.view')
    			->with('active_menu', 'blotter')
                ->with('active_submenu', '')
                ->with('blotter', $blotter);
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required',
    		'content' => 'required',
    		'complainant_name' => 'required',
    		'complainant_address' => 'required',
    		'complainant_contact_no' => 'required'
     	]);

     	if ($validator->fails())
     	{
     		return redirect()->back()->withErrors($validator)->withInput();
     	}

     	$blotter = \App\Blotter::find($request->input('blotter_id'));

     	$blotter->blotter_title = $request->input('title');
     	$blotter->blotter_content = $request->input('content');
     	$blotter->complainant_name = $request->input('complainant_name');
     	$blotter->complainant_address = $request->input('complainant_address');
     	$blotter->complainant_contact_no = $request->input('complainant_contact_no');

     	if ($blotter->save())
     	{
            $this->userlog->add(Auth::user()->user_id, 'Updated Blotter ID:'. $blotter->blotter_id);
     		session()->flash('status', true);
     	}
     	else
     	{
     		session()->flash('status', false);
     	}

     	return redirect()->route('blotter.all');
    }
}
