<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    public $fillable = ['lesson_id' , 'student_id', 'year_id' , 'grade'];
    public static $rules = [
            'student'             => 'required',
            'lesson'            => 'required',
            'grade'           => 'required|numeric',
        ];
    public function student()
    {
    	return $this->belongsTo('App\Models\Student');
    }

    public function lesson()
    {
    	return $this->belongsTo('App\Models\Lesson');
    }

    public function classes()
    {
    	return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function year(){
    	return $this->belongsTo('App\Models\Year');
    }

}
