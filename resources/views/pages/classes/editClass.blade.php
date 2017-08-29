    @extends('layouts.app')

    @section('title')
        Edit Class
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('class') }}">Class</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Class</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Edit Class </h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('class') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            <form action="/class/{{$class->id}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" >
                <!-- Task Name -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Class Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ $class->name }}" id="task-name" class="form-control">
                    </div>
                </div>

                  <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Capacity</label>

                    <div class="col-sm-6">
                        <input type="text" name="capacity" value="{{ $class->capacity }}" id="task-name" class="form-control">
                    </div>
                </div>

                   <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Room</label>

                    <div class="col-sm-6">
                       
                        <select name="room_id">
                            <option value='{{ $class->room }}' selected>{{ $class->rooms->name }}</option>
                            @foreach ($rooms as $room)
                            <option value='{{ $room->id }}'>{{ $room->name }}</option>
                            @endforeach
                        </select>   
                        
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Save
                        </button>
                    </div>
                </div>
        </form>
        </div>
    </div>
    @endsection
    
