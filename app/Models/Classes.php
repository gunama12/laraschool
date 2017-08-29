<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table    = 'classes';
    public $timestamps  = false;
    public $fillable    = ['name','capacity','room_id'];
    public static $rules = [
        'name' => 'required|unique:classes',
        'capacity' => 'required',
        'room_id' => 'required|unique:classes',
    ];


    public function students()
    {
    	return $this->hasMany('App\Models\Student');
    }

    public function rooms()
    {
    	return $this->hasOne('App\Models\Room' , 'id' , 'room_id');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    public function grade()
    {
        return $this->hasMany('App\Models\Grade');
    }
}
