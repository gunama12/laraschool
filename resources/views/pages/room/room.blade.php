    @extends('layouts.app')

    @section('title')
      Rooms
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
                <span>Room</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Room</h3>
    <a  class="btn btn-success reset" data-toggle="modal"  href="#responsive2"><i class="fa fa-plus"></i> Add New Room</a>
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
                                        <span class="caption-subject bold uppercase">List of Rooms</span>
                                    </div>  
                                     
                                    
                                </div>

                                <div class="portlet-body">
                                    
                                    @if (count($rooms) > 0)
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                 
                                                <th> No </th>
                                                <th> Name </th>                                        
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($rooms as $room)
                                            <tr>
                                                <td> {{$i}} </td>
                                                <td>{{ $room->name }}</td>
                                                <td>
                                                    <a href="{{ url('room/'.$room->id.'/edit') }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                    <button class="btn btn-xs btn-danger btn-delete" data-toggle="modal"  data-id="{{ $room->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button></td>
                                            </tr>
                                            <?php $i++;?> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
    <div class="modal fade" id="responsive2" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close reset" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Create Room</h4>
                            </div>
                            <div class="modal-body"> 
                                <form action="{{ route('room') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <!-- Task Name -->
                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Room Name</label>

                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name" class="form-control">
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
     <div class="modal fade" id="responsive" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Room</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this Room ? 
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


                $('.reset').click(reset);
               
                    function reset(){
                      $("#name").val("") ;
                      
                    }

                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/room/"+id);
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection