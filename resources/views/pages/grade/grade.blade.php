    @extends('layouts.app')

    @section('title')
      Grade 
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
                <span>Student</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Grade</span>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Grade </h3>
    <div class="">
        <a class="btn btn-success" href="{{ route('grade.create') }}"><i class="fa fa-pencil-square-o"></i> Insert Grade</a>
    </div><br>
    <div class="panel-heading">
      
            <form action="{{ URL::current() }}">
                        <div class="col-sm-3">
                            <select name="class" class=" form-control">
                                <option value="">--Choose Class--</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                             <select name="lesson" class=" form-control">
                                <option value="">--Choose Lesson--</option>
                                @foreach ($lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">  
                             <select name="year" class=" form-control">
                                <option value="">--Choose Study Year--</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->name." ".$year->semester }}</option>
                                @endforeach
                            </select>  
                        </div><div class="col-sm-1"></div>
                    <button type="submit" name="submit" class="btn btn-success">
                                            <i class="fa fa-search"></i> Search
                 </button>               
               <!-- <input type="submit" name="submit" value="search" class="btn btn-success "> -->
            </form><br>
            <form action="{{ URL::current() }}">
                <div class="col-sm-3">
                    <input placeholder="Search By Student Name" class="form-control" type="text" name="student">
                </div>
                  <button type="submit" name="submit2" class="btn btn-success">
                                            <i class="fa fa-search"></i> Search
                 </button>  
            </form>
      
       
    </div><hr>
    @include('common.errors')
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    @if ($message = Session::get('error'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">List of Grades</span>
                                    </div>  
                                     
                                    
                                </div>
                                @if (count($grades) > 0)
                               
                                <div class="portlet-body">                                    
                                    
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>   
                                            <tr>                                       
                                                <th>No</th>
                                                <th>Student</th>
                                                <th>Lesson</th>
                                                <th>Class</th>
                                                <th>Year</th>
                                                <th>Grade</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i = 1; ?>
                                          @foreach ($grades as $grade)
                                                <tr>
                                                    <td>
                                                       {{$i}}
                                                    </td>
                                                    
                                                    <td>
                                                       {{ $grade->student->name }}
                                                    </td>
                                                    <td>
                                                       <b>{{ $grade->lesson->name }}</b>
                                                    </td>
                                                    <td>
                                                       {{ $grade->classes->name }}
                                                    </td>
                                                    <td>
                                                       {{ $grade->year->name." ".$grade->year->semester }}
                                                    </td>
                                                    <td>
                                                       {{ $grade->grade }}
                                                    </td>

                                                    <td>
                                                        <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $grade->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                  </td>
                                                </tr>
                                             <?php $i++;?> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
    <div class="modal fade" id="responsive" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Grade</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this grade ? 
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
    @endsection
    
    @section('down_script')
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/grade/"+id);
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection