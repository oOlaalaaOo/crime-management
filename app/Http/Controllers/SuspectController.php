<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Suspect;
use App\Case_suspect;
use App\Suspect_file;
use Image;
use File;

class SuspectController extends Controller
{
    public function __construct() {

    }

    public function all() {
    	$suspects = DB::table('case_suspects')                         
                            ->leftJoin('suspects', 'case_suspects.suspect_id', '=', 'suspects.suspect_id')
                            ->paginate(5);

        return view('suspects')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('suspects', $suspects);
    }

    public function search(Request $request) {
        $name = $request->input('name');

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suspects = DB::table('case_suspects')                         
                            ->leftJoin('suspects', 'case_suspects.suspect_id', '=', 'suspects.suspect_id')
                            ->where(function($query) use($name) {
                                $query->orWhere('suspects.first_name' , 'like', '%' . $name . '%');
                                $query->orWhere('suspects.mid_name' , 'like', '%' . $name . '%');
                                $query->orWhere('suspects.last_name' , 'like', '%' . $name . '%');
                            }) 
                            ->get();

        return view('suspects')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('suspects', $suspects)
                ->with('name', $name);
    }

    public function add_view($case_id) 
    {
        $old_suspects = [];

        $cases = \App\Case_suspect::where('case_id', '=', $case_id)->get();

        foreach ($cases as $case)
        {
            $old_suspects[] = $case->suspect_id;
        }

        $suspects = \App\Suspect::whereNotIn('suspect_id', $old_suspects)->get();

        return view('suspects.add-view')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('case_id', $case_id)
                ->with('suspects', $suspects);
    }

    public function add_exist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'suspect_id' => 'required',
            'suspect_status' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $case_suspect = new Case_suspect;
        $case_suspect->case_id = $request->input('case_id');
        $case_suspect->suspect_id = $request->input('suspect_id');
        $case_suspect->suspect_status = $request->input('suspect_status');

        if ($case_suspect->save())
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
            'address' => 'required',
            'occupation' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"',
            'nationality' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('suspect.add.view', ['case_id' => $request->input('case_id')])->withErrors($validator)->withInput();
        }

        $suspect = new Suspect;
        $suspect->first_name = $request->input('first_name');
        $suspect->mid_name = $request->input('mid_name');
        $suspect->last_name = $request->input('last_name');
        $suspect->address = $request->input('address');
        $suspect->occupation = $request->input('occupation');
        $suspect->birth_date = $request->input('birth_date');
        $suspect->gender = $request->input('gender');
        $suspect->civil_status = $request->input('civil_status');
        $suspect->nationality = $request->input('nationality');

        $suspect->save();

        $case_suspect = new Case_suspect;
        $case_suspect->case_id = $request->input('case_id');
        $case_suspect->suspect_id = $suspect->suspect_id;
        $case_suspect->suspect_status = $request->input('status');
        $case_suspect->save();

        if ($request->hasFile('photoFile')) {
            $dir = $suspect->suspect_id;

            if (is_dir($dir) === false)
            {
                File::makeDirectory(public_path('suspect-files/'.$dir), $mode = 0777, true, true);
            }

            $image = $request->file('photoFile');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('suspect-files/' . $dir . '/' . $filename);

            Image::make($image->getRealPath())->resize(300, 300)->save($path);

            $suspect_file = new Suspect_file;
            $suspect_file->sf_filepath = $filename;
            $suspect_file->suspect_id = $suspect->suspect_id;

            $suspect_file->save();
        }

        session()->flash('status', true);
        return redirect()->route('case.details', ['case_id' => $request->input('case_id')]);
    }

    public function update_view($suspect_id, $case_id) {
        $suspect = DB::table('suspects')
                        ->leftJoin('case_suspects', 'suspects.suspect_id', '=', 'case_suspects.suspect_id')
                        ->where('suspects.suspect_id', '=', $suspect_id)
                        ->where('case_suspects.case_id', '=', $case_id)
                        ->first();
        $file = DB::table('suspect_files')
                        ->where('suspect_id', '=', $suspect_id)
                        ->first();

        return view('suspects.update-view')
                ->with('active_menu', 'suspects')
                ->with('active_submenu', '')
                ->with('suspect_id', $suspect_id)
                ->with('case_suspect_id', $suspect->case_suspect_id)
                ->with('suspect', $suspect)
                ->with('case_id', $case_id)
                ->with('file', $file);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'mid_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"',
            'nationality' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'civil_status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('suspect.update.view', ['suspect_id' => $request->input('suspect_id'), 'case_id' => $request->input('case_id')])->withErrors($validator)->withInput();
        }

        $suspect = Suspect::find($request->input('suspect_id'));
        $suspect->first_name = $request->input('first_name');
        $suspect->mid_name = $request->input('mid_name');
        $suspect->last_name = $request->input('last_name');
        $suspect->address = $request->input('address');
        $suspect->occupation = $request->input('occupation');
        $suspect->birth_date = $request->input('birth_date');
        $suspect->gender = $request->input('gender');
        $suspect->civil_status = $request->input('civil_status');
        $suspect->nationality = $request->input('nationality');

        $suspect->save();

        $case_suspect = Case_suspect::find($request->input('case_suspect_id'));
        $case_suspect->suspect_status = $request->input('status');
        $case_suspect->save();

        if ($request->hasFile('photoFile')) {
            $dir = $suspect->suspect_id;

            if (is_dir($dir) === false)
            {
                File::makeDirectory(public_path('suspect-files/'.$dir), $mode = 0777, true, true);
            }

            $image = $request->file('photoFile');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('suspect-files/' . $dir . '/' . $filename);

            Image::make($image->getRealPath())->resize(300, 300)->save($path);

            $suspect_file = Suspect_file::find($request->input('suspect_file_id'));
            $suspect_file->sf_filepath = $filename;
            $suspect_file->suspect_id = $suspect->suspect_id;

            $suspect_file->save();
        }

        session()->flash('status', true);
        return redirect()->route('case.details', ['suspect_id' => $suspect->suspect_id, 'case_id' => $request->input('case_id')]);
    }
}
