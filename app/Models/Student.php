<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';
    public $fillable = ['name','account_number','gender','birth_date','birth_place','school_origin','status','mothers_name', 'fathers_name', 'class_id','description', 'address','photo'];
    public static $rules = [
        'name'                   => 'required',
        'account_number'         => 'required|unique:students',
        'gender'                 => 'required',
        'birth_date'             => 'required',
        'birth_place'            => 'required',
        'register_date'          => 'required',
        'school_origin'          => 'required',
        'status'                 => 'required',
        'mothers_name'           => 'required',
        'fathers_name'           => 'required',
        'address'                => 'required',
        'description'            => 'required',
        'photo'                  => 'mimes:jpg,jpeg,JPEG,png|max:4048',
        'class_id'               => 'required',
    ];

     public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function grade()
    {
    	return $this->hasMany('App\Models\Grade');
    }
}
