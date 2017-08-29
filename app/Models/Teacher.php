<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $table = 'teachers';
	public $fillable = ['name','account_number','gender','date','address','photo'];
	public static $rules = [
	        'name'           => 'required',
            'account_number' => 'required|unique:teachers',
            'gender'         => 'required',
            'date'           => 'required',
            'address'        => 'required',
            'photo'          => ['mimes:jpg,jpeg,JPEG,png', 'max:2024']
    ];
	public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    public function teacherPresence()
    {
        return $this->hasMany('App\Models\TeacherPresence');
    }
}
