    @extends('layouts.app')

    @section('title')
      Edit Teacher 
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('teacher') }}">Teacher</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit Teacher</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Edit Teacher </h3>
    <div>
        <a class="btn btn-primary" href="{{ route('teacher') }}"> Back</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            
            <form action="/teacher/{{$teacher->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" >

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Teacher Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" value="{{ $teacher->name }}" class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Account Number</label>

                <div class="col-sm-6">
                    <input type="text" name="account_number" value="{{ $teacher->account_number }}" id="task-name" class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Gender</label>

                <div class="col-sm-6">
                    <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    </select>
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Date of Birth</label>

                <div class="col-sm-6">
                    <input class="form-control form-control-inline input-medium date-picker" name="date" data-date-format="yyyy-mm-dd" value="{{ $teacher->date_of_birth }}" size="16" type="text" value="" />
                </div>
             </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-6">
                    <textarea name="address" id="task-name" class="form-control"> {{ $teacher->address }}</textarea>
                </div>
            </div>

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
    
