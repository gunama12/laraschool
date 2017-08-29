    @extends('layouts.app')

    @section('title')
      Teacher Presences
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
                <span>Teacher</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Presences</span>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Teacher Presences </h3>
    @include('common.errors')
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    
    @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
    @endif
    <div class="">
        <a class="btn btn-success" data-toggle="modal" href="#responsive2"><i class="fa fa-pencil-square-o"></i> Insert Presence</a>
    </div><br>
    <div class="panel-heading">
            <form action="{{ URL::current() }}">
                 <div class="form-group">
                    
                    <div class="col-sm-4">
                         <select name="year" class="input input-medium form-control" >
                        <option value="">--Choose Study Year--</option>
                        @foreach ($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name.' '.$year->semester }}</option>
                        @endforeach
                    </select>     
                    </div>
                   
                        <button type="submit" name="submit" class="btn btn-success">
                                                <i class="fa fa-search"></i> Search
                        </button> 
                    
                     
                 </div>             
               <!-- <input type="submit" name="submit" value="search" class="btn btn-success "> -->
            </form>
    </div><hr>
    <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">List of Teacher Presences : 
                                            @if(isset($yearName))
                                            {{ $yearName->name." ".$yearName->semester}}
                                            @endif
                                        </span>
                                    </div>  
                                     
                                    
                                </div>

                                <div class="portlet-body">                                    
                                    

                                     <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>   
                                            <tr>                                       
                                                <th>No</th>
                                                <th>Teacher</th>
                                                <th>Account Number</th>
                                                <th>Alpha</th>
                                                <th>Sick</th>
                                                <th>Permit</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->account_number }}</td>
                                                <td>{{ $teacher->alpha}}</td>
                                                <td>{{ $teacher->sick}}</td>
                                                <td>{{ $teacher->permit}}</td>
                                                <td><button class="btn btn-xs open_modal btn-success" data-id="@if(isset($yearName))
                                                                                                                {{ $yearName-> id }}
                                                                                                               @else
                                                                                                                {{  $yearActive[0]->id}}
                                                                                                                @endif" 
                                                            value="{{ $teacher->id }}" id="{{ $teacher->name }}">Detail</button></td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    <div class="modal fade" id="responsive" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Teacher Presence</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this presence ? 
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

     <div class="modal fade" data-backdrop="static" data-keyboard="false"data-width="760"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header bg-blue-chambray bg-font-blue-chambray">
             <button type="button" class="reset close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Presence Detail</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <b>Name :&nbsp;</b><b id="nameInModal"></b>
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody id="presence">
                            </tbody>
                        </table>
                
                    </div>
                        
                
                </div>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline reset" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>

     <div class="modal fade" id="responsive2" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close reset" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Insert Teacher Presence</h4>
                            </div>
                            <div class="modal-body"> 
                                  
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
                                            <input type="text" name="year_id" id="year_field" 
                                            value="{{ $yearActive[0]->name.' '.$yearActive[0]->semester }}" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <!-- Task Name -->
                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Teacher</label>
                                        <div class="col-sm-6">
                                            <select name='teacher_id' id="name_field"class="form-control">
                                                @foreach($teachers as $teacher)
                                                <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Date</label>

                                        <div class="col-sm-6">
                                           <input id="datepicker" class="form-control form-control-inline date-picker" name="date" data-date-format="yyyy-mm-dd" value="{{ old('date') }}" size="16" type="text" value="" />
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Status</label>

                                        <div class="col-sm-6">
                                            <select name="status" id="status_field" class="form-control">
                                                    <option value="Alpha">Alpha</option>
                                                    <option value="Sick">Sick</option>
                                                    <option value="Permit">Permit</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                               
                            </div>
                        <div class="modal-footer">
                             <button type="submit" class="btn btn-info">
                                                <i class="fa fa-plus"></i> Save
                             </button>
                              </form> 
                             <button type="button" class="btn dark reset btn-outline" data-dismiss="modal">Close</button>                
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
              
                 $('.reset').click(reset);
               
                    function reset(){
                      $("#date_field").val("") ;
                    }

                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/teacherpresence/"+id);
                });

                 var url = "http://localhost:8000/teacherpresence";
                //display modal form for product editing
                $(document).on('click','.open_modal',function(){
                    var teacher_id = $(this).val();
                    var teacher_name = $(this).attr('id');
                    var year_id = $(this).attr('data-id');

                    $.get(url + '/' + teacher_id + '/' + year_id , function (data) {
                        //success data
                        console.log(data);
                        var tr;
                        
                        for (var i = 0; i < data.length; i++){
                            tr = $('<tr/>');
                            tr.append("<td>" + data[i].status + "</td>");
                            tr.append("<td>" + data[i].date + "</td>");
                            tr.append("<td>" + data[i].year_id + "</td>");
                            $('tbody#presence').append(tr);
                        }
                        $('#nameInModal').text(teacher_name);
                        $('#myModal').modal('show');
                         $(".reset").click(function(){
                            $("tbody#presence").empty();
                        });
                    }) 
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection