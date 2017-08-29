<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\TeacherPresence;
use App\Models\Year;
use App\Models\Teacher;



class TeacherPresenceController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }   

    
	public function index(){
        $yearActive    = Year::where('active' , 1)->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
      	$years	= Year::orderBy('name' , 'asc')->get();
        $year = Input::has('year') ? Input::get('year') : null;
        $yearName = Input::has('year') ? Year::where('id' , $year)->first() : null;
        
        for ($i=0; $i < count($teachers); $i++) { 
            $teachers[$i]->alpha = TeacherPresence::where([
                               ['status' , 'alpha'], 
                               ['teacher_id' , $teachers[$i]->id ]
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

            $teachers[$i]->sick = TeacherPresence::where([
                               ['status' , 'sick'], 
                               ['teacher_id' , $teachers[$i]->id ]
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

            $teachers[$i]->permit = TeacherPresence::where([
                               ['status' , 'permit'], 
                               ['teacher_id' , $teachers[$i]->id ]
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
 
        return view('pages.presence.teacherPresence', compact('years', 'teachers', 'yearActive' , 'yearName'));
    }

    public function create(){
    	$year    = Year::where('active' , 1)->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        return view('pages.presence.createTeacherPresence' , [
                    'teachers' => $teachers,
                    'year'	   => $year,
                    ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), TeacherPresence::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $countPresenceExist = TeacherPresence::where('teacher_id', $request->teacher_id)->where('date', $request->date)->count();
        if($countPresenceExist > 0){
            return redirect('/teacherpresence')->with('error', 'The presence has already been taken')->withInput();
        }

  		$year_id = Year::where('active' , 1)->first();
        $teacherPresence = new TeacherPresence;
        $teacherPresence->teacher_id        = $request->teacher_id;
        $teacherPresence->year_id        	= $year_id->id;
        $teacherPresence->date            	= $request->date;
        $teacherPresence->status            = $request->status;
        $teacherPresence->save();
        return redirect('/teacherpresence')->with('success', 'Success insert presence');
    }

    public function delete(TeacherPresence $teacherPresence)
    {
        $teacherPresence->delete();
        return redirect('/teacherpresence')->with('success', 'Success delete presence');
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
