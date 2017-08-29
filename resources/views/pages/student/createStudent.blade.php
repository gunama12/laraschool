    @extends('layouts.app')

    @section('title')
      Register Student
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/admin">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('student') }}">Student</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Register Student</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Register Student </h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('student') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            
            <form action="{{ route('student') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Student Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" value="{{ old('name') }}" class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Account Number</label>

                <div class="col-sm-6">
                    <input type="text" name="account_number" id="task-name" value="{{ old('account_number') }}" class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Gender</label>

                <div class="col-sm-6">
                    <select name="gender" class="form-control input-medium">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    </select>
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Date of Birth</label>

                <div class="col-sm-6">
                   <input class="form-control form-control-inline input-medium date-picker" name="birth_date" data-date-format="yyyy-mm-dd" value="{{ old('birth_date') }}" size="16" type="text" value="" />
              
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Birth Place</label>

                <div class="col-sm-6">
                    <input type="text" name="birth_place" id="task-name" value="{{ old('birth_place') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Register Date</label>

                <div class="col-sm-6">
                    <input class="form-control form-control-inline input-medium date-picker" name="register_date" data-date-format="yyyy-mm-dd" value="{{ old('register_date') }}" size="16" type="text" value="" />
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">School Origin</label>

                <div class="col-sm-6">
                    <input type="text" name="school_origin" id="task-name" value="{{ old('school_origin') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Status</label>

                <div class="col-sm-6">
                    <input type="text" name="status" id="task-name" value="{{ old('status') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Mother's Name</label>

                <div class="col-sm-6">
                    <input type="text" name="mothers_name" id="task-name" value="{{ old('mothers_name') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Father's name</label>

                <div class="col-sm-6">
                    <input type="text" name="fathers_name" id="task-name" value="{{ old('fathers_name') }}" class="form-control">
                </div>
            </div>


              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-6">
                    <textarea name="address" id="task-name" class="form-control">{{ old('name') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Class</label>

                 <div class="col-sm-6">
                    <select name="class_id" class="form-control input-small">
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{ $class->name }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <input type="text" name="description" id="task-name" value="{{ old('description') }}" class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Photo</label>

                <div class="col-sm-6">
                    <input type="file" name="photo" id="task-name" class="form-control">
                </div>
            </div>


            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
    @endsection
    
