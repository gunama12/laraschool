<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
	protected $table = 'years';
	public $fillable = ['name','semester'];
	public $timestamps = false;
    public static $rules = [
        'name'             => 'required|min:9|max:9',
        'semester'         => 'required|max:2|numeric', 
        ];
	public function schedules()
    {
        return $this->hasMany('App\Models\Schedules');
    }

    public function grade()
    {
    	return $this->hasMany('App\Models\Grade');
    }

    public function teacherPresence()
    {
        return $this->hasMany('App\Models\TeacherPresence');
    }
}
