<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect; 
use App\Http\Requests;
use App\Models\Lesson;

class LessonController extends Controller
{
	public function __construct()
	{
    	$this->middleware('auth');
	}

    public function index()
    {
    	$lessons = Lesson::orderBy('id', 'asc')->get();
    	return view('pages.lesson.lesson', [
    		'lessons' => $lessons
    	]);
    }

    public function store(Request $request)
    {
	    $validator = Validator::make($request->all(), ['name' => 'required|max:255|unique:lessons']);
		if ($validator->fails()){
			return redirect('/lesson')->withInput()->withErrors($validator);
		}

		$lesson = new Lesson;
		$lesson->name = $request->name;
		$lesson->save();
		return redirect('/lesson')->with('success', 'Succes register lesson');
    }

    public function delete(Lesson $lesson)
    {
    	$lesson->delete();
		return redirect('/lesson');
	}

    public function update(Request $request, $id)
    {
        Lesson::find($id)->update($request->all());
        return redirect('/lesson')->with('success', 'Succes Update lesson');
    }
}
