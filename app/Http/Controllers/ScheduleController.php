<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Schedule;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Year;
use Illuminate\Support\Facades\Input;
use Validator;

class ScheduleController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $activeYear =   Year::where('active', '1')->first();        
        $classes    =   Classes::orderBy('name' , 'asc')->get();
        $lessons = Lesson::orderBy('name' , 'asc')->get();
        $teachers = Teacher::orderBy('name' , 'asc')->get();

        $classHasSchedule = Schedule::where('class_id', Input::get('class'))->count();
        if($classHasSchedule > 0){
            $className  =  Schedule::where('class_id', Input::get('class'))->first()->classes->name;
        }
        else{
            $className  = null;
        }
        // dd($className);    
    	// $schedules = Schedule::orderBy('class_id', 'asc')->get();
    	// return view('pages.schedule.schedule', compact('classes', 'schedules'));
        $mondaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'monday');
            })->get();

        $tuesdaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'tuesday');
            })->get();

        $wednesdaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'wednesday');
            })->get();

        $thursdaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'thursday');
            })->get();

        $fridaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'friday');
            })->get();

        $saturdaySchedules = Schedule::where(function($query){
            $class = Input::has('class') ? Input::get('class') : null;
            // $class = $request->input('class');
            $query->where('class_id', $class)->where('day', 'saturday');
            })->get();

        return view('pages.schedule.schedule', compact('teachers', 'lessons', 'classes', 'mondaySchedules', 'tuesdaySchedules', 'className',
                                 'wednesdaySchedules', 'activeYear' ,'thursdaySchedules', 'fridaySchedules', 'saturdaySchedules'));
    
    }

    public function create(){
    	$lessons = Lesson::orderBy('name' , 'asc')->get();
    	$classes = Classes::orderBy('name' , 'asc')->get();
    	$teachers = Teacher::orderBy('name' , 'asc')->get();
    	$year    = Year::where('active' , 1)->get();
    	return view('pages.schedule.createSchedule', compact('lessons', 'classes', 'teachers', 'year'));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), Schedule::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
    	$year_id = Year::where('active' , 1)->first();
        $schedule = new Schedule;
        $schedule->lesson_id 		= $request->lesson;
        $schedule->class_id		    = $request->class;
        $schedule->teacher_id       = $request->teacher;
        $schedule->year_id        	= $year_id->id;
        $schedule->day       		= $request->day;
        $schedule->start     		= $request->start;
        $schedule->finish     		= $request->finish;
        $schedule->save();
        return redirect('/schedule?class='.$request->class.'&submit=search')->with('success', 'Succes Create new Schedule of class ');
    }

      public function delete(Schedule $schedule)
    {
        $schedule->delete();
        return redirect('/schedule');
    }
}
