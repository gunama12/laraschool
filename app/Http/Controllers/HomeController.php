<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\Classes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $totalTeacher = Teacher::get()->count();
        $totalStudent = Student::get()->count();
        $totalLesson  = Lesson::get()->count();
        $totalClass = Classes::get()->count();
        return view('pages.home' , [
                'totalStudent' => $totalStudent,
                'totalTeacher' => $totalTeacher,
                'totalLesson'  => $totalLesson,
                'totalClass' => $totalClass,
            ]);
    }
}
