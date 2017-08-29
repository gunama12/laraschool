<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'lesson'], function(){
	Route::get('/', 'LessonController@index')->name('lesson');
	Route::post('/', 'LessonController@store');
	Route::delete('/{lesson}', 'LessonController@delete');
	Route::put('/{id}', 'LessonController@update');
});

Route::group(['prefix'=>'teacher'], function(){
	Route::get('/', 'TeacherController@index')->name('teacher');
	Route::get('/create', 'TeacherController@create')->name('teacher.create');
	Route::get('/{id}/edit', 'TeacherController@edit');
	Route::put('/{id}', 'TeacherController@update');
	Route::post('/', 'TeacherController@store');
	Route::delete('/{teacher}', 'TeacherController@delete');

	Route::get('/{teacher_id?}',function($teacher_id){
    $teacher = App\Models\Teacher::find($teacher_id);
    return response()->json($teacher);
	});
});

Route::group(['prefix'=>'student'], function(){
	Route::get('/', 'StudentController@index')->name('student');
	Route::get('/create', 'StudentController@create')->name('student.create');
	Route::get('/{id}/edit', 'StudentController@edit');
	Route::put('/{id}', 'StudentController@update');
	Route::post('/', 'StudentController@store');
	Route::delete('/{student}', 'StudentController@delete');

	Route::get('/{student_id?}',function($student_id){
    $student = App\Models\Student::find($student_id);
    return response()->json($student);
	});
});

Route::group(['prefix'=>'class'], function(){
	Route::get('/', 'ClassController@index')->name('class');
	Route::get('/create', 'ClassController@create')->name('class.create');
	Route::get('/{id}/edit', 'ClassController@edit');
	Route::put('/{id}', 'ClassController@update');
	Route::post('/', 'ClassController@store');
	Route::delete('/{class}', 'ClassController@delete');
});

Route::group(['prefix'=>'room'], function(){
	Route::get('/', 'RoomController@index')->name('room');
	Route::get('/create', 'RoomController@create')->name('room.create');
	Route::get('/{id}/edit', 'RoomController@edit');
	Route::put('/{id}', 'RoomController@update');
	Route::post('/', 'RoomController@store');
	Route::delete('/{room}', 'RoomController@delete');
});


Route::group(['prefix'=>'year'], function(){
	Route::get('/', 'YearController@index')->name('year');
	Route::get('/create', 'YearController@create')->name('year.create');
	Route::get('/{id}/edit', 'YearController@edit')->name('year.edit');
	Route::put('/{id}', 'YearController@update');
	Route::post('/', 'YearController@store');
	Route::delete('/{year}', 'YearController@delete');
});

Route::group(['prefix'=>'schedule'], function(){
	Route::get('/', 'ScheduleController@index')->name('schedule');
	Route::get('/create', 'ScheduleController@create')->name('schedule.create');
	Route::get('/{id}/edit', 'ScheduleController@edit');
	Route::put('/{id}', 'ScheduleController@update');
	Route::post('/', 'ScheduleController@store');
	Route::delete('/{schedule}', 'ScheduleController@delete');
});

Route::group(['prefix'=>'grade'], function(){
	Route::get('/', 'GradeController@index')->name('grade');
	Route::get('/create', 'GradeController@create')->name('grade.create');
	Route::get('/{id}/edit', 'GradeController@edit');
	Route::put('/{id}', 'GradeController@update');
	Route::post('/', 'GradeController@store');
	Route::delete('/{grade}', 'GradeController@delete');
});


Route::group(['prefix'=>'teacherpresence'], function(){
	Route::get('/', 'TeacherPresenceController@index')->name('teacherPresence');
	Route::get('/create', 'TeacherPresenceController@create')->name('teacherPresence.create');
	Route::get('/{id}/edit', 'TeacherPresenceController@edit');
	Route::put('/{id}', 'TeacherPresenceController@update');
	Route::post('/', 'TeacherPresenceController@store');
	Route::delete('/{teacherPresence}', 'TeacherPresenceController@delete');

	Route::get('/{teacher_id?}/{year_id?}',function($teacher_id,$year_id){
    $presence = App\Models\TeacherPresence::where([
    										['teacher_id', $teacher_id],
    										['year_id', $year_id]
    										])->orderBy('date')->get();
    return response()->json($presence);
	});
});

Route::group(['prefix'=>'studentpresence'], function(){
	Route::get('/', 'StudentPresenceController@index')->name('studentPresence');
	Route::get('/create', 'StudentPresenceController@create')->name('studentPresence.create');
	Route::get('/{id}/edit', 'StudentPresenceController@edit');
	Route::put('/{id}', 'StudentPresenceController@update');
	Route::post('/', 'StudentPresenceController@store');
	Route::delete('/{studentPresence}', 'StudentPresenceController@delete');

	Route::get('/{class_id?}/{year_id?}',function($class_id,$year_id){
    $presence = App\Models\StudentPresence::where([
    										['class_id', $class_id],
    										['year_id', $year_id]
    										])->with('student')->orderBy('date')->get();
    return response()->json($presence);
	});
});






