<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $table 	= 'rooms';
    public $timestamps 	= false;
    public $fillable 	= ['name'];
 
    public function classes()
    {
    	return $this->belongsTo('App\Models\classes', 'room_id');
    }
}
