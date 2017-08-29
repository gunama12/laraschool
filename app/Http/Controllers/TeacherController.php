<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect; 
use App\Http\Requests;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$teachers = Teacher::orderBy('name', 'asc')->get();
        return view('pages.teacher.teacher', [
    		'teachers' => $teachers
    	   ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Teacher::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $file               = $request->file('photo');
        $fileName          = $request->account_number."_".$file->getClientOriginalName();
        $destinationPath    = base_path().'/public/uploads/teachers';
        $file->move($destinationPath,$fileName);
		$teacher = new Teacher;
		$teacher->name                  = $request->name;
        $teacher->account_number        = $request->account_number;
        $teacher->gender                = $request->gender;
        $teacher->date_of_birth         = $request->date;
        $teacher->address               = $request->address;
        $teacher->photo                 = $fileName;
        $teacher->save();
        return redirect('/teacher')->with('success' , 'Teacher registered succesfully');
    }

    public function delete(teacher $teacher)
    {
    	$teacher->delete();
	    return redirect('/teacher');
    }

    public function create()
    {
    	return view('pages.teacher.CreateTeacher');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher) abort(404);
        return view('pages.teacher.editTeacher', ['teacher' => $teacher]);
    }

     public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name                  = $request->name;
        $teacher->account_number        = $request->account_number;
        $teacher->gender                = $request->gender;
        $teacher->date_of_birth         = $request->date;
        $teacher->address               = $request->address;
        $teacher->save();
        return redirect('/teacher')->with('success', 'Succes Update teacher');
    }
}
