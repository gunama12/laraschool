<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect;
use App\Http\Requests;
use App\Models\Student;
use App\Models\classes;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller
{
    
	public function __construct()
	{
    	$this->middleware('auth');
	}

	public function index(){
        $classes = Classes::orderBy('name' , 'asc')->get();   
    	// $students = Student::orderBy('id', 'asc')->get();
        // return view('pages.student.student')->with('students', $students)->with('classes', $classes);
        $students = Student::where(function($query){
        $class = Input::has('class') ? Input::get('class') : null;
        $status = Input::has('status') ? Input::get('status') : null;
        $student = Input::has('student') ? Input::get('student') : null; 
            if (isset($student)){
                       $query->where('name', 'like' , '%'.$student.'%');
            }
            else if(isset($class)){
                if(isset($status)){
                     if($status == 'all'){
                        $query->where([
                            ['status', '<' , 2],
                            ['class_id', $class],
                            ]);
                     }else{
                         $query->where([
                                ['class_id', $class],
                                ['status', $status]
                                ]);
                    }
                }else{
                    $query->where([
                            ['class_id', $class],
                            ['status', 1],
                            ]);
                }
            }else{
                if(isset($status)){
                     if($status == 'all'){
                        $query->where('status', '<' , 2);
                     }else{
                         $query->where('status', $status);
                     }
                }else{
                    $query->where('status', 1);
                }
            }
        })->get();

        $className = Input::has('class') ? Classes::where('id', Input::get('class'))->first()->name : 'All';
        return view('pages.student.student', compact('classes', 'students', 'className'));
    }

    public function create(){
        $classes = Classes::orderBy('name', 'asc')->get();
        return view('pages.student.CreateStudent' , [
                    'classes' => $classes
                    ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Student::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $file               = $request->file('photo');
        $fileName           = $request->account_number."_".$file->getClientOriginalName();
        $destinationPath    = base_path().'/public/uploads/students';
        $file->move($destinationPath, $fileName);

        $student = new Student;
        $student->name              = $request->name;
        $student->account_number    = $request->account_number;
        $student->gender            = $request->gender;
        $student->birth_date        = $request->birth_date;
        $student->birth_place       = $request->birth_place;
        $student->register_date     = $request->register_date;
        $student->school_origin     = $request->school_origin;
        $student->status            = $request->status;
        $student->mothers_name      = $request->mothers_name;
        $student->fathers_name      = $request->fathers_name;
        $student->address           = $request->address;
        $student->description       = $request->description;
        $student->photo             = $fileName;
        $student->class_id          = $request->class_id;
        $student->save();
        return redirect('/student')->with('success', 'Succes register new student');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect('/student');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if(!$student) abort(404);

        return view('pages.student/EditStudent', ['student' => $student] );
    }

    public function update(Request $request, $id)
    {
        Student::find($id)->update($request->all());
        return redirect('/student')->with('success', 'Succes Update student');
    }
}
