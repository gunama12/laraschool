<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\StudentPresence;
use App\Models\Year;
use App\Models\Student;
use App\Models\Classes;
use App\Http\Requests;

class StudentPresenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    
	public function index(){
      	// $years	= Year::orderBy('name' , 'asc')->get();
       //  $classes  = Classes::orderBy('name' , 'asc')->get();
       //  $studentPresences = StudentPresence::where(function($query){
       //  $year   = Input::has('year') ? Input::get('year') : null;
       //  $class  = Input::has('class') ? Input::get('class') : null;

       //   if (isset($year)){
       //          if (isset($class)){
       //              $query->where([
       //                      ['year_id', $year],
       //                      ['class_id', $class ]
       //              ]);
       //          }
       //          else{
       //              $query->where('year_id', $year);
       //          }
       //  }
       //  else{
       //          if (isset($class)){
       //              $query->where('class_id',$class);
       //          }
       //          else{
       //              $query->where('class_id', $class);
       //          }
       //      }
      
       //  })->orderBy('date')->get();
       //  return view('pages.presence.studentPresence', compact('years', 'studentPresences', 'classes'));
    
        $yearActive    = Year::where('active' , 1)->get();
        $classes = Classes::orderBy('name', 'asc')->get();
        $years  = Year::orderBy('name' , 'asc')->get();
        $year = Input::has('year') ? Input::get('year') : null;
        $yearName = Input::has('year') ? Year::where('id' , $year)->first() : null;
        
        for ($i=0; $i < count($classes); $i++) { 
            $classes[$i]->alpha = StudentPresence::where([
                               ['status' , 'alpha'], 
                               ['class_id' , $classes[$i]->id ]
                               ])->where(function($query){
                                    $yearActive    = Year::where('active' , 1)->first();
                                    $year = Input::has('year') ? Input::get('year') : null;
                                    if(isset($year)){
                                        $query->where('year_id', $year);
                                    }else{
                                        $query->where('year_id', $yearActive->id);
                                    }
                               })
                               ->count();

            $classes[$i]->sick = StudentPresence::where([
                               ['status' , 'sick'], 
                               ['class_id' , $classes[$i]->id ]
                               ])->where(function($query){
                                    $yearActive    = Year::where('active' , 1)->first();
                                    $year = Input::has('year') ? Input::get('year') : null;
                                    if(isset($year)){
                                        $query->where('year_id', $year);
                                    }else{
                                        $query->where('year_id', $yearActive->id);
                                    }
                               })
                               ->count();

            $classes[$i]->permit = StudentPresence::where([
                               ['status' , 'permit'], 
                               ['class_id' , $classes[$i]->id ]
                               ])->where(function($query){
                                    $yearActive    = Year::where('active' , 1)->first();
                                    $year = Input::has('year') ? Input::get('year') : null;
                                    if(isset($year)){
                                        $query->where('year_id', $year);
                                    }else{
                                        $query->where('year_id', $yearActive->id);
                                    }
                               })
                               ->count();
            
        }
 
        return view('pages.presence.studentPresence', compact('years', 'classes', 'yearActive' , 'yearName'));
    }

    public function create(){
    	$year      = Year::where('active' , 1)->get();
        $students  = Student::orderBy('name', 'asc')->get();
        return view('pages.presence.createStudentPresence' , [
                    'students' => $students,
                    'year'	   => $year,
                    ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), StudentPresence::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $classId = Student::where('id', $request->student_id)->first()->class_id;
  		$yearId  = Year::where('active' , 1)->first()->id;


        $countPresenceExist = StudentPresence::where('student_id', $request->student_id)->where('date', $request->date)->count();
        if($countPresenceExist > 0){
            return redirect('/studentpresence')->with('error', 'The presence has already been taken')->withInput();
        }

        $studentPresence = new StudentPresence;
        $studentPresence->student_id        = $request->student_id;
        $studentPresence->year_id           = $yearId;
        $studentPresence->class_id        	= $classId;
        $studentPresence->date            	= $request->date;
        $studentPresence->status            = $request->status;
        $studentPresence->save();
        return redirect('/studentpresence')->with('success', 'Success insert presence');
    }

    public function delete(StudentPresence $studentPresence)
    {
        $studentPresence->delete();
        return redirect('/studentpresence')->with('success', 'Success delete presence');
    }

//     public function edit($id)
//     {
//         $student = Student::find($id);
//         if(!$student) abort(404);

//         return view('pages.presence/EditStudent', ['student' => $student] );
//     }

//     public function update(Request $request, $id)
//     {
//         Student::find($id)->update($request->all());
//         return redirect('/student')->with('success', 'Succes Update student');
//     }
// }
}
