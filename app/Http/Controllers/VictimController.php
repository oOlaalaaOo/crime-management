<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Victim;
use App\Case_victim;
use App\Victim_file;
use Image;
use File;
use Auth;
class VictimController extends Controller
{
    public function __construct() {

    }

    public function all() 
    {
        $case_victims = DB::table('case_victims')
                            ->selectRaw('DISTINCT(victim_id)')
                            ->leftJoin('cases', 'case_victims.case_id', '=', 'cases.case_id')
                            ->leftJoin('user_cases', 'user_cases.case_id', '=', 'cases.case_id')
                            ->where('user_cases.user_id', '=', Auth::user()->user_id)
                            ->get();
        $cvs = [];

        foreach ($case_victims as $cv)
        {
            $cvs[] = $cv->victim_id;
        }

        $victims = DB::table('victims')                         
                        ->whereIn('victim_id', $cvs)
                        ->paginate(5);

        return view('victims')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('victims', $victims);
    }

    public function show()
    {

    }

    public function search(Request $request) {
        $name = $request->input('name');

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $case_victims = DB::table('case_victims')
                            ->selectRaw('DISTINCT(case_victims.victim_id)')
                            ->leftJoin('victims', 'case_victims.victim_id', '=', 'victims.victim_id')
                            ->where(function($query) use($name) {
                                $query->orWhere('victims.first_name' , 'like', '%' . $name . '%');
                                $query->orWhere('victims.mid_name' , 'like', '%' . $name . '%');
                                $query->orWhere('victims.last_name' , 'like', '%' . $name . '%');
                            }) 
                            ->get();
        $cvs = [];

        foreach ($case_victims as $cv)
        {
            $cvs[] = $cv->victim_id;
        }

        $victims = DB::table('victims')                         
                        ->whereIn('victim_id', $cvs)
                        ->paginate(5);

        return view('victims')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('victims', $victims)
                ->with('name', $name);
    }

    public function add_view($case_id) {

        $old_victims = [];

        $cases = \App\Case_victim::where('case_id', '=', $case_id)->get();

        foreach ($cases as $case)
        {
            $old_victims[] = $case->victim_id;
        }

        $victims = \App\Victim::whereNotIn('victim_id', $old_victims)->get();

        return view('victims.add-view')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('case_id', $case_id)
                ->with('victims', $victims);
    }

    public function add_exist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'victim_id' => 'required',
            'victim_status' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $case_victim = new Case_victim;
        $case_victim->case_id = $request->input('case_id');
        $case_victim->victim_id = $request->input('victim_id');
        $case_victim->victim_status = $request->input('victim_status');

        if ($case_victim->save())
        {
            session()->flash('status', true);
        }
        else
        {
            session()->flash('status', false);
        }

        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function add(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'mid_name' => 'required',
            'last_name' => 'required',
            'victim_address' => 'required',
            'victim_occupation' => 'required',
            'victim_birth_date' => 'required|date_format:"Y-m-d"',
            'victim_nationality' => 'required',
            'victim_status' => 'required',
            'victim_gender' => 'required',
            'victim_civil_status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('victim.add.view', ['case_id' => $request->input('case_id')])->withErrors($validator)->withInput();
        }

        $victim = new Victim;
        $victim->first_name = $request->input('first_name');
        $victim->mid_name = $request->input('mid_name');
        $victim->last_name = $request->input('last_name');
        $victim->address = $request->input('victim_address');
        $victim->occupation = $request->input('victim_occupation');
        $victim->contact_no = $request->input('victim_contact_no');
        $victim->birth_date = $request->input('victim_birth_date');
        $victim->sex = $request->input('victim_gender');
        $victim->civil_status = $request->input('victim_civil_status');
        $victim->nationality = $request->input('victim_nationality');

        $victim->save();

        $case_victim = new Case_victim;
        $case_victim->case_id = $request->input('case_id');
        $case_victim->victim_id = $victim->victim_id;
        $case_victim->victim_status = $request->input('victim_status');
        $case_victim->save();

        $filename = null;

        if ($request->hasFile('photoFile')) {
            $dir = $victim->victim_id;

            if (is_dir($dir) === false)
            {
                File::makeDirectory(public_path('victim-files/'.$dir), $mode = 0777, true, true);
            }

            $image = $request->file('photoFile');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('victim-files/' . $dir . '/' . $filename);

            Image::make($image->getRealPath())->resize(300, 300)->save($path);

            
        }

        $victim_file = new Victim_file;
        $victim_file->vf_filepath = $filename;
        $victim_file->victim_id = $victim->victim_id;

        $victim_file->save();

        session()->flash('status', true);
        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function update_view($victim_id) {

        $victim = DB::table('victims')
                        ->where('victim_id', '=', $victim_id)
                        ->first();

        $file = DB::table('victim_files')
                        ->where('victim_id', '=', $victim_id)
                        ->first();

        return view('victims.update-view')
                ->with('active_menu', 'victims')
                ->with('active_submenu', '')
                ->with('victim_id', $victim_id)
                ->with('victim', $victim)
                ->with('file', $file);
    }

    public function update(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'mid_name' => 'required',
            'last_name' => 'required',
            'victim_address' => 'required',
            'victim_occupation' => 'required',
            'victim_birth_date' => 'required|date_format:"Y-m-d"',
            'victim_nationality' => 'required',
            'victim_gender' => 'required',
            'victim_civil_status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('victim.update.view', ['victim_id' => $request->input('victim_id')])->withErrors($validator)->withInput();
        }

        $victim = Victim::find($request->input('victim_id'));
        $victim->first_name = $request->input('first_name');
        $victim->mid_name = $request->input('mid_name');
        $victim->last_name = $request->input('last_name');
        $victim->address = $request->input('victim_address');
        $victim->occupation = $request->input('victim_occupation');
        $victim->contact_no = $request->input('victim_contact_no');
        $victim->birth_date = $request->input('victim_birth_date');
        $victim->sex = $request->input('victim_gender');
        $victim->civil_status = $request->input('victim_civil_status');
        $victim->nationality = $request->input('victim_nationality');

        if ($victim->save())
        {
            if ($request->hasFile('photoFile')) {
                $dir = $victim->victim_id;

                if (is_dir($dir) === false)
                {
                    File::makeDirectory(public_path('victim-files/'.$dir), $mode = 0777, true, true);
                }

                $image = $request->file('photoFile');
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('victim-files/' . $dir . '/' . $filename);

                Image::make($image->getRealPath())->resize(300, 300)->save($path);

                $count_file = Victim_file::where('victim_file_id', '=', $request->input('victim_file_id'))->count();

                if ($count_file > 0)
                {
                    $victim_file = Victim_file::find($request->input('victim_file_id'));
                    $victim_file->vf_filepath = $filename;
                    $victim_file->victim_id = $victim->victim_id;

                    $victim_file->save();
                }
                else
                {
                    $victim_file = new Victim_file;
                    $victim_file->vf_filepath = $filename;
                    $victim_file->victim_id = $victim->victim_id;

                    $victim_file->save();
                }
            }

            session()->flash('status', true);
            return redirect()->route('victim.update.view', ['victim_id' => $victim->victim_id]);
        }

        
    }
}
