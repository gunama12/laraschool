<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    public $timestamps = false;
    public $fillable = ['lesson_id' , 'class_id', 'teacher_id', 'year_id' , 'day', 'start', 'finish'];
    public static $rules = [
            'class'             => 'required',
            'lesson'            => 'required',
            'teacher'           => 'required',
            'day'               => 'required',
            'start'             => 'required',
            'finish'            => 'required',
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\Year');
    }

	public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
}
