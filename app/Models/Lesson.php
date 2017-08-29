<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';
    public $fillable = ['name'];
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    public function grade()
    {
    	return $this->hasMany('App\Models\Grade');
    }
}
