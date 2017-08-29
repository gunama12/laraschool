    @extends('layouts.app')

    @section('title')
      Students List 
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
                <span>Student List</span>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Student </h3>
    <div class="">
        <a class="btn btn-success" href="{{ route('student.create') }}"><i class="fa fa-user-plus"></i> Register New Student</a>
    </div><br>
    <div class="panel-heading">
            <form action="{{ URL::current() }}">
               <div class="col-sm-4">
                <select name="class" class="form-control">
                    <option value="">--ALL CLASSES--</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" @if($class->name == $className) {{ 'selected' }} @endif>{{ $class->name }}</option>
                    @endforeach
                </select>
               </div>    
                <div class="form-group">
                                              
                    <div class="radio-list">
                         <div class="md-radio-inline">
                                                <div class="md-radio">
                                                    <input type="radio" id="radio6" name="status" value="1" @if(!isset($_GET['status']) || $_GET['status']== 1) checked @endif class="md-radiobtn">
                                                    <label for="radio6">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Active </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="radio7" name="status" value="0" @if(isset($_GET['status']) &&  $_GET['status']== 0 ) checked @endif class="md-radiobtn">
                                                    <label for="radio7">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Not Active </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="radio8" name="status" value="all" @if(isset($_GET['status']) &&  $_GET['status']=='all') checked @endif class="md-radiobtn">
                                                    <label for="radio8">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> All</label>
                                                </div><button type="submit" name="submit" class="btn btn-success">
                                            <i class="fa fa-search"></i> Search
                         </button>  
                                            </div>
                           
                    </div>

                    
                </div>
                           
               <!-- <input type="submit" name="submit" value="search" class="btn btn-success "> -->
            </form>
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
         <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-list font-dark"></i>
                                        <span class="caption-subject bold uppercase">
                                            @if($className !== 'All')
                                            {{ 'List' }}
                                                @if(isset($_GET['status']))
                                                    @if($_GET['status'] == '1')   
                                                        {{ 'Active'}}
                                                    @elseif($_GET['status'] == '0')
                                                        {{ 'Not Active'}}
                                                    @else
                                                        {{ 'All'}}
                                                    @endif
                                                @endif
                                            {{ ' Students of Class '.$className }}
                                            @else
                                            {{ 'List of All '}}
                                                @if(isset($_GET['status']))
                                                    @if($_GET['status'] == '0')
                                                        {{ 'Not Active'}}
                                                    @elseif($_GET['status'] == '0')
                                                        {{ 'Active'}}
                                                    @else
                                                        {{ ''}}
                                                    @endif
                                                @else
                                                    {{ 'Active'}}
                                                @endif
                                            {{ 'Students' }}   
                                            @endif
                                             </span>
                                    </div>  
                                     
                                    
                                </div>

                                <div class="portlet-body">
                                    
                                    @if (count($students) > 0)
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Account No.</th>
                                                <th>Date Of birth</th>
                                                <th>Gender</th> 
                                                @if($className == 'All')
                                                <th>Class</th>
                                                @endif
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php $i = 1; ?>
                      @foreach ($students as $student)
                            <tr>
                                <td>
                                    <div>{{$i}}</div>
                                </td>
                                <!-- Task Name -->
                                <td>
                                    <div>{{ $student->name }}</div>
                                </td>
                                <td>
                                    <div>{{ $student->account_number }}</div>
                                </td>
                                <td>
                                    <div>{{ $student->birth_date }}</div>
                                </td>
                                
                                <td>
                                    <div>{{ $student->gender }}</div>
                                </td>
                                
                                 @if($className == 'All')
                                <td><div>{{ $student->classes->name }}</div></td>
                                @endif

                              <td>
                                    <button class="btn btn-xs open_modal btn-success" data-id="{{ $student->classes->name }}" value="{{ $student->id }}">Detail</button>
                                    <a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                                    <button class="btn btn-danger btn-xs btn-delete" data-toggle="modal"  data-id="{{ $student->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
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
                                    <h4 class="modal-title">Delete Student</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this student ? 
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

     <div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header bg-blue-chambray bg-font-blue-chambray">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Student Info</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="student_image" class="img-responsive" style="margin-bottom:2px;">
                    </div>
                    <div class="col-md-6">
                        <table style="width:100%;">
                            <tr><th style="width:50%;"></th><th style="width:50%;"></th></tr>
                            <tr><td>Name            </td> <td><strong id="student_name"></strong></td></tr>
                            <tr><td>Account Number  </td> <td><strong id="account_number"></strong></td></tr>
                            <tr><td>Class           </td> <td><strong id="class"></strong></td></tr>
                            <tr><td>Gender          </td> <td><strong id="gender"></strong></td></tr>
                            <tr><td>Date of Birth   </td> <td><strong id="date"></strong></td></tr>
                            <tr><td>Birth Place     </td> <td><strong id="place"></strong></td></tr>
                            <tr><td>Address         </td> <td><strong id="address"></strong></td></tr>
                            <tr><td>Father's Name   </td> <td><strong id="father"></strong></td></tr>
                            <tr><td>Mother's Name   </td> <td><strong id="mother"></strong></td></tr>
                            <tr><td>Register Date   </td> <td><strong id="register"></strong></td></tr>
                            <tr><td>School Origin   </td> <td><strong id="school"></strong></td></tr>    
                            <tr><td>Status          </td> <td><strong id="status"></strong></td></tr>
                            <tr><td>Description     </td> <td><strong id="description"></strong></td></tr>

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
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/student/"+id);
                });

                var url = "http://localhost:8000/student";
                $(document).on('click','.open_modal',function(){
                    var student_id = $(this).val();
                    var class_name = $(this).attr('data-id');
                    $.get(url + '/' + student_id, function (data) {
                        //success data
                        console.log(data);
                        $('#student_image').attr("src" , "http://localhost:8000/uploads/students/" + data.photo);
                        $('#student_name').text(data.name);
                        $('#account_number').text(data.account_number);
                        $('#class').text(class_name);
                        $('#gender').text(data.gender);
                        $('#date').text(data.birth_date);
                        $('#place').text(data.birth_place);
                        $('#address').text(data.address);
                        $('#father').text(data.fathers_name);
                        $('#mother').text(data.mothers_name);
                        $('#register').text(data.register_date);
                        $('#school').text(data.school_origin);
                        if(data.status == 1){
                            $('#status').text('Active');
                        }
                        else{
                            $('#status').text('Not Active');   
                        }
                        $('#description').text(data.description);
                        $('#myModal').modal('show');
                    }) 
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection