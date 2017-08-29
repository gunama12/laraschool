<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherPresence extends Model
{
    protected $table = 'teacher_presences';
	public $fillable = ['year_id','date','teacher_id','status'];
	public static $rules = [
	        'teacher_id'           => 'required',
            'status'         => 'required',
            'date'           => 'required',
    ];
	
	public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\year');
    }

}
