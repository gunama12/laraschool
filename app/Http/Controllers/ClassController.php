<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator, Input, Redirect;
use App\Http\Requests;
use App\Models\Classes;

class ClassController extends Controller
{
  	public function __construct()
	{
    	$this->middleware('auth');
	}

	public function index()
    {
    	$classes = Classes::orderBy('name', 'asc')->get();
        // Classes::students()->select()
        $reserved_room_ids = DB::table('classes')->select('room_id')->get();
        $roomIds = array();
        foreach ($reserved_room_ids as $key) {
            $roomIds = array_prepend($roomIds, $key->room_id);
        }
        $rooms = DB::table('rooms')
                    ->whereNotIn('id', $roomIds)
                    ->get();

        // for ($i=0; $i < count($classes); $i++) 
        // { 
        // $classes[$i]['room'] = Classes::find($classes[$i]['id'])->rooms['name'];
        // }
        return view('pages.classes.class', [
    	'classes' => $classes,
        'rooms'   => $rooms
    	]);
    }

    public function create(){
        $reserved_room_ids = DB::table('classes')->select('room_id')->get();
        $roomIds = array();
        foreach ($reserved_room_ids as $key) {
            $roomIds = array_prepend($roomIds, $key->room_id);
        }
        $rooms = DB::table('rooms')
                    ->whereNotIn('id', $roomIds)
                    ->get();

        return view('pages.classes.CreateClass', [
            'rooms' => $rooms
            ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Classes::$rules);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        Classes::create($request->all());
        return redirect('/class')->with('success', 'Succes register new Class');
    }

    public function delete(Classes $class)
    {
    	$class->delete();
		return redirect('/class')->with('success', 'Succes Delete class');
	}


    public function edit($id)
    {   $reserved_room_ids = DB::table('classes')->select('room_id')->get();
        $roomIds = array();
        foreach ($reserved_room_ids as $key) {
            $roomIds = array_prepend($roomIds, $key->room_id);
        }
        $rooms = DB::table('rooms')
                    ->whereNotIn('id', $roomIds)
                    ->get();

        $class = Classes::find($id);
        if(!$class) abort(404);

        return view('pages.classes/EditClass', [
                            'class' => $class,
                            'rooms'  => $rooms
                    ]);
    }

    public function update(Request $request, $id)
    {
        Classes::find($id)->update($request->all());
        return redirect('/class')->with('success', 'Succes Update class');
    }
}
