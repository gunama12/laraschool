    @extends('layouts.app')

    @section('title')
      Insert Grade
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
                <span>Insert Grade</span>
            </li>
        </ul>
    </div>
    
    <h3 class="page-title">Insert Grade</h3>
    <div >
                    <a class="btn btn-primary" href="{{ route('grade') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ URL::current() }}" class="form-horizontal">
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Choose Class</label>

                    <div class="col-sm-3">
                       <select name="class" class="form-control input-medium">
                            <option value="null">--Choose Class--</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select> 
                        
                    </div><button type="submit" name="submit" class="btn btn-success" value="search"> <i class="fa fa-search"></i>Search</button>
                </div>
            </form>
                    <hr>
            @include('common.errors')
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            
            @if(count($students) > 0)
             <form action="{{ route('grade') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Student Name</label>
                    <div class="col-sm-6">
                        <select name="student">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
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
                    <label for="task" class="col-sm-3 control-label">Grade</label>

                    <div class="col-sm-6">
                       <input type="number" min="0" max="100"  name="grade">
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
            @endif
        </div>
    </div>
    @endsection
    
