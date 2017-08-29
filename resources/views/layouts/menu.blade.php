<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
    <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler"> </div>
    </li>
    <li class="sidebar-search-wrapper">
        <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
            <a href="javascript:;" class="remove">
                <i class="icon-close"></i>
            </a>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
    </li>
    <li id="li_dashboard" class="nav-item ">
        <a href="{{ route('home') }}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <li class="heading">
        <h3 class="uppercase">Features</h3>
    </li>
    <li id="li_lesson" class="nav-item  ">
        <a href="{{ route('lesson') }}" class="nav-link ">
        <i class="icon-list"></i>
            <span class="title">Lesson</span>
        </a>
    </li>
    <li id="li_teacher" class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Teachers</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li id="li_teacher_l" class="nav-item ">
                <a href="{{ route('teacher') }}" class="nav-link "> List Teachers </a>
            </li>
            <li id="li_teacher_p" class="nav-item ">
                <a href="{{ route('teacherPresence') }}" class="nav-link "> Presences</a>
            </li>
        </ul>
    </li>
    <li id="li_student" class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
         <i class="icon-users"></i>
            <span class="title">Students</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li id="li_student_l" class="nav-item ">
                <a href="{{ route('student') }}" class="nav-link "> List Students </a>
            </li>
            <li id="li_class" class="nav-item ">
                <a href="{{ route('class') }}" class="nav-link "> Classes </a>
            </li>
            <li id="li_student_p" class="nav-item ">
                <a href="{{ route('studentPresence')}}" class="nav-link "> Presence</a>
            </li>
            <li id="li_grade" class="nav-item ">
                <a href="{{ route('grade') }}" class="nav-link "> Grade</a>
            </li>
        </ul>
    </li>
    <li id="li_schedule" class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-calendar"></i>
            <span class="title">Schedules</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li id="li_schedule_l" class="nav-item ">
                <a href="{{ route('schedule') }}" class="nav-link "> Schedules </a>
            </li>
            <li id="li_year" class="nav-item ">
                <a href="{{ route('year') }}" class="nav-link "> Study Year</a>
            </li>
        </ul>
    </li>
    <li id="li_room" class="nav-item  ">
        <a href="{{ route('room') }}" class="nav-link ">
        <i class="icon-grid"></i>
            <span class="title">Rooms</span>
        </a>
    </li>
</ul>