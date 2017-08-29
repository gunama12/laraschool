    @extends('layouts.app')

    @section('title')
      Insert Teacher Presence
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('teacherPresence') }}">Teacher</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Insert Presence</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Insert Presence </h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('teacherPresence') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            
            <form action="{{ route('teacherPresence') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Year</label>

                <div class="col-sm-6">
                    <input type="text" name="year_id" id="task-name" 
                    value="{{ $year[0]->name.' '.$year[0]->semester }}" class="form-control" disabled>
                </div>
            </div>

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Teacher</label>
                <div class="col-sm-6">
                    <select name='teacher_id'>
                        @foreach($teachers as $teacher)
                        <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Date</label>

                <div class="col-sm-6">
                   <input class="form-control form-control-inline input-medium date-picker" name="date" data-date-format="yyyy-mm-dd" value="{{ old('date') }}" size="16" type="text" value="" />
                </div>
            </div>



            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Status</label>

                <div class="col-sm-6">
                    <select name="status">
                            <option value="Alpha">Alpha</option>
                            <option value="Sick">Sick</option>
                            <option value="Permit">Permit</option>
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
    
