<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPresence extends Model
{
    protected $table = 'student_presences';
	public $fillable = ['year_id','date','class_id', 'student_id', 'status'];
	public static $rules = [
	        'student_id'           => 'required',
            'status'         => 'required',
            'date'           => 'required',
    ];
	
	public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\year');
    }

}
