    @extends('layouts.app')

    @section('title')
      Dashboard
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
                <span>Dashboard</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
     
    <h3 class="page-title"> Dashboard
        <small>dashboard & statistics</small>
    </h3>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $totalTeacher }}">0</span>
                    </div>
                    <div class="desc"> Total Teacher </div>
                </div>
                    <a class="more" href="{{ route('teacher') }}"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
            </div>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $totalStudent}}">0</span> 
                    </div>
                     <div class="desc"> Total Student </div>
                </div>
                    <a class="more" href="{{ route('student') }}"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
            </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-book"></i>
                </div>
                <div class="details">
                    <div class="number">
                            <span data-counter="counterup" data-value="{{ $totalLesson}}">0</span>
                    </div>
                    <div class="desc"> Total lesson </div>
                </div>
                    <a class="more" href="{{ route('lesson') }}"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
            </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-th-large"></i>
                </div>
                <div class="details">
                    <div class="number"> + <span data-counter="counterup" data-value="{{ $totalClass}}"></span>%</div>
                    <div class="desc"> Classes </div>
                </div>
                <a class="more" href="{{ route('room') }}"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
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
                    $("#delForm").attr("action", "/class/"+id);
                });
            })
        </script>
    @endsection

    @section('data_table')
        
    @endsection