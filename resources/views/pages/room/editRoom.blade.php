    @extends('layouts.app')

    @section('title')
      Edit Room
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('class') }}">Room</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Room</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Edit Room </h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('room') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            <form action="/class/{{$room->id}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" >
                <!-- Task Name -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Room Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ $room->name }}" id="task-name" class="form-control">
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
    
