    @extends('layouts.app')

    @section('title')
      Lessons
    @endsection

    @section('up_script')
        
    @endsection
    
    @section('page-content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Lesson</span>

            </li>
        </ul>
    </div>
    
    <h3 class="page-title"> Lessons </h3>
    <a class="btn btn-success" data-toggle="modal" href="#responsive2"><i class="fa fa-plus"></i> Add new Lesson</a>
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
                                        <span class="caption-subject bold uppercase">List of Lessons</span>
                                        
                                    </div>  
                                </div>

                                <div class="portlet-body">
                                    
                                    @if (count($lessons) > 0)
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
                                            @foreach ($lessons as $lesson)
                                            <tr>
                                                <td> {{$i}} </td>
                                                    <form action="/lesson/{{$lesson->id}}" method="POST" class="form-horizontal">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PUT" >
                                                <td><input type="text" name="name" value="{{ $lesson->name }}"></td>                            
                                                <td>
                                                    <button type="submit" class="btn btn-info btn-xs"><i class="fa fa-save">&nbsp;</i>Save</button>
                                                    </form>
                                                    <button class="btn btn-xs btn-danger btn-delete" data-toggle="modal"  data-id="{{ $lesson->id }}" href="#responsive"><i class="fa fa-trash">&nbsp;</i>Delete</button>
                                                </td>
                                            </tr>
                                            <?php $i++;?> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                    @endif
        
    <div class="modal fade" id="responsive" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Delete Lesson</h4>
                            </div>
                            <div class="modal-body"> 
                                Are you sure want to delete this lesson ? 
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
    
     <div class="modal fade" id="responsive2" tabindex="-1" style="margin-top:15%;" data-width="760" >
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close reset" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Add new Lesson</h4>
                            </div>
                            <div class="modal-body"> 
                                <form action="{{ route('lesson') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <!-- Task Name -->
                                    <div class="form-group">
                                        <label for="task" class="col-sm-3 control-label">Lesson Name</label>

                                        <div class="col-sm-6">
                                            <input type="text" name="name" required id="name_field" class="form-control">
                                        </div>
                                    </div>

                                
                            </div>
                            <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">
                                                <i class="fa fa-plus"></i> Add Lesson
                                            </button>
                                        <button type="button" class="btn dark btn-outline reset" data-dismiss="modal">close</button>
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
                      $("#name_field").val("") ;
                    }
                $(document).on('click','.btn-delete',function(){
                    var id = $(this).attr('data-id');
                    $("#delForm").attr("action", "/lesson/"+id);
                });
            })
        </script>

         @endsection

    @section('data_table')
        
    @endsection