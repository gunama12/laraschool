    @extends('layouts.app')

    @section('title')
      Teacher List 
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
                <span>Teacher List</span>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Teachers </h3>
     <a class="btn btn-success" data-toggle="modal" href="#responsive2"><i class="fa fa-plus"></i> Add New Teacher</a>
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
                                        <span class="caption-subject bold uppercase">List of Teachers</span>
                                    </div>  
                                     
                                    
                                </div>

                                <div class="portlet-body">
                                   
                                    @if (count($teachers) > 0)
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                 
                                                <th> No </th>
                                                <th> Name </th>
                                                <th> Account Number </th>
                                                <th> Gender </th>
                                                <th> Date of Birth </th>
                                                <th> Photo </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($teachers as $teacher)
                                            <tr>
                                                <td> {{$i}} </td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->account_number }}</td>
                                                <td>{{ $teacher->gender }}</td>
                                                <td>{{ $teacher->date_of_birth }}</td>
                                                <td><img style="width:50px;height:70px;" title="{{ $teacher->photo }}"src="{{ asset('/uploads/teachers/'.$teacher->photo)}}"></td>
                                                <td>
                                                    <button class="btn btn-xs open_modal btn-success" value="{{ $teacher->id }}">Detail</button>
                                                    <a href="{{ url('teacher/'.$teacher->id.'/edit') }}" class="btn btn-xs btn-info">Edit</a>
                                                    <button class="btn btn-xs btn-danger btn-delete" data-toggle="modal"  data-id="{{ $teacher->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
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
                                    <h4 class="modal-title">Delete Teacher</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this teacher ? 
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


     <div class="modal fade bs-modal-lg" id="responsive2" tabindex="-1" data-width="760" >
            <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close reset" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Register New Teacher</h4>
                            </div>
                            <div class="modal-body"> 
                                <form action="{{ route('teacher') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <!-- Task Name -->
                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Teacher Name</label>

                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name_field" class="form-control">
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Account Number</label>

                                        <div class="col-sm-6">
                                            <input type="text" name="account_number" id="account_num_field" class="form-control">
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Gender</label>

                                        <div class="col-sm-6" >
                                            <select name="gender" class="form-control input-medium">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Date of Birth</label>

                                        <div class="col-sm-6">
                                            <input id="date_field"class="form-control form-control-inline input-medium date-picker" name="date" data-date-format="yyyy-mm-dd" value="{{ old('date') }}" size="16" type="text" value="" />
                                        </div>
                                     </div>

                                      <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Address</label>

                                        <div class="col-sm-6">
                                            <textarea name="address" id="address_field" class="form-control"></textarea>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Photo</label>

                                        <div class="col-sm-6">
                                            <input type="file" name="photo" id="photo_field" class="form-control">
                                        </div>
                                    </div>

                            </div>
                                    <div class="modal-footer">
                                             <button type="submit" class="btn btn-info">
                                                <i class="fa fa-plus"></i> Save
                                            </button>
                                         </form> 
                                        <button type="button" class=" btn dark btn-outline reset" data-dismiss="modal">Close</button>
                                    </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                            <!-- /.modal-dialog -->
    </div>

    

    <div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header bg-blue-chambray bg-font-blue-chambray">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Teacher Info</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="teacher_image" class="img-responsive" style="margin-bottom:2px;">
                    </div>
                    <div class="col-md-6">
                        <table style="width:100%;">
                            <tr><th style="width:50%;"></th><th style="width:50%;"></th></tr>
                            <tr><td>Name            </td> <td><strong id="teacher_name"></strong></td></tr>
                            <tr><td>Account Number  </td> <td><strong id="account_number"></strong></td></tr>
                            <tr><td>Gender          </td> <td><strong id="gender"></strong></td></tr>
                            <tr><td>Date of Birth   </td> <td><strong id="date"></strong></td></tr>
                            <tr><td>Address         </td> <td><strong id="address"></strong></td></tr>
                        </table>
                    </div>
                    <!-- <div class="form-group error">
                     <label for="inputName" class="col-sm-3 control-label">Name</label>
                       <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                       </div>
                       </div>
                     <div class="form-group">
                     <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
                        </div>
                    </div> -->
                
                </div>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
  </div>

       
    @endsection
    
    @section('down_script')
    <meta name="_token" content="{!! csrf_token() !!}" />
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){

                $('.reset').click(reset);
               
                    function reset(){
                      $("#name_field").val("") ;
                      $("#account_num_field").val("") ;
                      $("#date_field").val("") ;
                      $("#address_field").val("") ;
                      $("#photo_field").val("") ;
                    }

                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/teacher/"+id);
                });

                 var url = "http://localhost:8000/teacher";
                //display modal form for product editing
                $(document).on('click','.open_modal',function(){
                    var teacher_id = $(this).val();
                   
                    $.get(url + '/' + teacher_id, function (data) {
                        //success data
                        console.log(data);
                        $('#teacher_image').attr("src" , "http://localhost:8000/uploads/teachers/" + data.photo);
                        $('#teacher_name').text(data.name);
                        $('#account_number').text(data.account_number);
                        $('#gender').text(data.gender);
                        $('#date').text(data.date_of_birth);
                        $('#address').text(data.address);
                        $('#myModal').modal('show');
                    }) 
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection