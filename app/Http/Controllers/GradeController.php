<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Student;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Year;
use Illuminate\Support\Facades\Input;
use Validator;


class GradeController extends Controller
{
	 public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $classes = Classes::orderBy('name' , 'asc')->get(); 
        $lessons = Lesson::orderBy('name' , 'asc')->get(); 
        $years = Year::orderBy('name' , 'asc')->get();  
    	 
        $grades = Grade::where(function($query){
            $year   = Input::has('year') ? Input::get('year') : null;
            $class  = Input::has('class') ? Input::get('class') : null;
            $lesson  = Input::has('lesson') ? Input::get('lesson') : null;
            $student = Input::has('student') ? 
                        Student::where('name', 'like' , '%'.Input::get('student').'%')->first() : null; 
             if (isset($student)){
                       $query->where('student_id', $student->id);
                }
             else if (isset($class)){
                    if (isset($lesson)){
                        if (isset($year)){
                            $query->where([
                                    ['year_id', $year],
                                    ['class_id', $class ],
                                    ['lesson_id', $lesson ]
                            ]);
                        }
                        else{
                            $query->where([
                                ['year_id', $year],
                                ['class_id', $class ]
                            ]);
                        }
                    }
                    else{
                        $query->where('class_id', $class );
                    }        
            }else{
                if(isset($lesson)){
                    if(isset($year)){
                        $query->where([
                            ['lesson_id', $lesson ],
                            ['year_id', $year ]
                            ]);
                    }else{
                         $query->where('lesson_id', $lesson );
                    }
                }else{
                    if (isset($year)){
                         $query->where('year_id', $year );
                    }else{
                         $query->where('class_id', $class );
                    }

                }
                
            }
        })->get();

        // $grades = Grade::where(function($query){
        //     $class = Input::has('class') ? Input::get('class') : null;
        //     // $class = $request->input('class');
        //     $query->where('class_id', $class);
        // })->get();
        return view('pages.grade.grade', compact('classes', 'grades', 'lessons', 'years'));
    
    }

    public function create(Request $request){
    	$classes = Classes::orderBy('name' , 'asc')->get();
    	$lessons = Lesson::orderBy('name' , 'asc')->get();

        $students = Student::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class);
        })->get();
      
    	return view('pages.grade.createGrade', compact('lessons', 'classes', 'students'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Grade::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $class   = Student::find($request->student)->class_id;
        $year_id = Year::where('active' , 1)->first();
        $grade = new Grade;
        $grade->lesson_id 	= $request->lesson;
        $grade->class_id    = $class;
        $grade->student_id  = $request->student;
        $grade->year_id     = $year_id->id;
        $grade->grade       = $request->grade;
        $grade->save();
        return redirect('/grade')->with('success', 'Succes insert grade');
    }

      public function delete(Grade $grade)
    {       
        $grade->delete();
        return redirect('/grade')->with('success', 'Success Delete Grade');
    }
}
