<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('up_script')
         <link href="{{ asset('/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />   
        <link href="{{ asset('/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="{{ asset('/assets/favicon/favicon.ico')}}" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        @yield('datepicker')
          <link href="{{ asset('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
        
       
    </head>
    
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="{{ route('home') }}">
                        <h3 style="margin-bottom:0;"  class="logo-default"><span  style="color:red">SCHOOL</span></h3> 
                        <h5 style="margin-top:0;"  class="logo-default"><span  style="color:white">INFORMATION</span></h5>
                    </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                @include('layouts.menu-account')
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    @include('layouts.menu')
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">
                    @include('layouts.theme')
                    
                    @yield('page-content')
                </div>
            </div>
        </div>
        
        @include('layouts.footer')
        

        <script src="{{ asset('/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        @yield('down_script')
         <script src="{{ asset('/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('/assets/pages/scripts/table-datatables-buttons.min.js') }}" type="text/javascript"></script>
        @yield('down_modal')
        <script src="{{ asset('/assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/pages/scripts/table-datatables-editable.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/assets/pages/scripts/ui-confirmations.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('/assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>
        @yield('maps_script')
        @yield('datepicker_script')
        <script src="{{ asset('/assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/clockface/js/clockface.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('/assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        
        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        
        <script src="{{ asset('/assets/pages/scripts/ui-modals.js') }}" type="text/javascript"></script>
        @yield('file_upload')
        @yield('data_table')
        <script type="text/javascript">
          if(window.location.href.indexOf("home") > -1){
             $("#li_dashboard").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("lesson") > -1){
             $("#li_lesson").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("schedule") > -1){
             $("#li_schedule").attr("class", "nav-item start active open");
             $("#li_schedule_l").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("year") > -1){
             $("#li_schedule").attr("class", "nav-item start active open");
             $("#li_year").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("teacher") > -1){
             if(window.location.href.indexOf("presence") > -1){
                $("#li_teacher_p").attr("class", "nav-item start active open");
             }else{
                $("#li_teacher_l").attr("class", "nav-item start active open");
             }
             $("#li_teacher").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("student") > -1){
             if(window.location.href.indexOf("presence") > -1){
                $("#li_student_p").attr("class", "nav-item start active open");
             }else{
                $("#li_student_l").attr("class", "nav-item start active open");
             }
             $("#li_student").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("grade") > -1){
             $("#li_student").attr("class", "nav-item start active open");
             $("#li_grade").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("class") > -1){
             $("#li_student").attr("class", "nav-item start active open");
             $("#li_class").attr("class", "nav-item start active open");
          }else if(window.location.href.indexOf("room") > -1 ){
             $("#li_room").attr("class", "nav-item start active open");
          }
        </script>
        </body>


    </html>