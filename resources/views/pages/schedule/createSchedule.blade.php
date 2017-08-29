    @extends('layouts.app')

    @section('title')
      Create Schedule
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('schedule') }}">Schedule</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Create Schedule</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Create Schedule </h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('schedule') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            
            <form action="{{ route('schedule') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Year</label>

                <div class="col-sm-6">
                    <input type="text" name="date" id="task-name" 
                    value="{{ $activeYear->name.' '.$activeYear->semester }}" class="form-control" disabled>
                </div>
            </div>

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Class</label>
                <div class="col-sm-6">
                    <select name='class'>
                        @foreach($classes as $class)
                        <option value='{{ $class->id }}'>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Lesson</label>

                <div class="col-sm-6">
                    <select name='lesson'>
                        @foreach($lessons as $lesson)
                        <option value='{{ $lesson->id }}'>{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Teacher</label>

                <div class="col-sm-6">
                    <select name='teacher'>
                        @foreach($teachers as $teacher)
                        <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Day</label>

                <div class="col-sm-6">
                    <select name="day">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                    </select>
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Start</label>

                <div class="col-sm-6">
                    <input type="time" name="start" id="task-name" class="form-control">
                </div>
            </div>


              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Finish</label>

                <div class="col-sm-6">
                    <input type="time" name="finish" id="task-name" class="form-control">
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
    
