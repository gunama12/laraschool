<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Room;

class RoomController extends Controller
{
    
  	public function __construct()
	{
    	$this->middleware('auth');
	}

	public function index()
    {

        $rooms = Room::orderBy('name', 'asc')->get();
        return view('pages.room.room', [
    	            'rooms' => $rooms
    	           ]);
    }

    public function create()
    {
        return view('pages.room.CreateRoom');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:rooms']);
        $room = new Room;
        $room->name = $request->name;
        $room->save();
        return redirect('/room')->with('success', 'Succes register new Room');
    }

    public function delete(Room $room)
    {
    	$room->delete();
		return redirect('/room')->with('success', 'Succes delete room');
	}

      public function edit($id)
    {   
        $room = Room::find($id);
        if(!$room) abort(404);

        return view('pages.room/editRoom', ['room'  => $room ]);
    }

    public function update(Request $request, $id)
    {
        Room::find($id)->update($request->all());
        return redirect('/room')->with('success', 'Succes Update room');
    }

}
