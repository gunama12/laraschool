    @extends('layouts.app')

    @section('title')
      Schedule List
    @endsection

    @section('up_script')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"> 
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Schedule</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Schedule List</span>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Schedule </h3>
    <div class="">
        <a class="btn btn-success" data-toggle="modal" href="#responsive2"><i class="fa fa-plus"></i> Insert Schedule</a>
    </div><br>
    <div class="panel-heading">
            <form action="{{ URL::current() }}">
                <div class="col-sm-3">
                    <select name="class" class="form-control">
                        <option value="null">--Choose Class--</option>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>      
                 </div>
                    <button type="submit" value="true" name="submit" class="btn btn-success">
                                                <i class="fa fa-search"></i> Search
                    </button>               
               
               <!-- <input type="submit" name="submit" value="search" class="btn btn-success "> -->
            </form>
    </div>
    @include('common.errors')
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    
    <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">List of Schedules 
                                            @if (isset($className))
                                            {{ ' of '.$className}}
                                            @endif
                                        </span>
                                    </div>  
                                     
                                    
                                </div>

                                <div class="portlet-body">
                                @if (count($mondaySchedules) > 0)
                                <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Monday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($mondaySchedules as $mondaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $mondaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $mondaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $mondaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $mondaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $mondaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (count($tuesdaySchedules) > 0)
                                <div class="portlet box yellow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Tuesday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($tuesdaySchedules as $tuesdaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $tuesdaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $tuesdaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $tuesdaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $tuesdaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $tuesdaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (count($wednesdaySchedules) > 0)
                                <div class="portlet box purple">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Wednesday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($wednesdaySchedules as $wednesdaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $wednesdaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $wednesdaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $wednesdaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $wednesdaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $wednesdaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (count($thursdaySchedules) > 0)
                                <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Thursday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($thursdaySchedules as $thursdaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $thursdaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $thursdaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $thursdaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $thursdaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $thursdaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (count($fridaySchedules) > 0)
                                <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Friday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($fridaySchedules as $fridaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $fridaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $fridaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $fridaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $fridaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $fridaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (count($saturdaySchedules) > 0)
                                <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Saturday </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Lesson</th>
                                                    <th>Teacher</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ($saturdaySchedules as $saturdaySchedule)
                                                <tr>
                                                    <td>
                                                        <div>{{$i}}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $saturdaySchedule->start }}</div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $saturdaySchedule->finish }}</div>
                                                    </td>
                                                    <td>
                                                        <div><b>{{ $saturdaySchedule->lesson->name }}</b></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $saturdaySchedule->teacher->name }}</div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $saturdaySchedule->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                    </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                                
                                </div>
    </div>
       
    </div>
    <div class="modal fade" id="responsive" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Schedule</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this schedule ? 
                            </div>
                                    <div class="modal-footer">
                                            
                                            
                                    <form id="delForm" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash">&nbsp;</i>Delete
                                        </button>


                                    </form>
                                    </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                            <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="responsive2" tabindex="-1" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Insert New Schedule</h4>
                            </div>
                            <div class="modal-body"> 
                                
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
                    <select name='class' class="form-control">
                        @foreach($classes as $class)
                        <option value='{{ $class->id }}'>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

              <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Lesson</label>

                <div class="col-sm-6">
                    <select name='lesson' class="form-control">
                        @foreach($lessons as $lesson)
                        <option value='{{ $lesson->id }}'>{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Teacher</label>

                <div class="col-sm-6">
                    <select name='teacher' class="form-control">
                        @foreach($teachers as $teacher)
                        <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Day</label>

                <div class="col-sm-6">
                    <select name="day" class="form-control">
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
                   
                </div>
            </div>
         
                            </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save
                                        </button>
            </form>  
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                    </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                            <!-- /.modal-dialog -->
    </div>
    @endsection
    
    @section('down_script')
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/schedule/"+id);
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection