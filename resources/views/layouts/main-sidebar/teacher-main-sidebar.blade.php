<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('dashboardes/teacher.Programname') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('dashboardes/teacher.Programname') }}</li>
        <li>
            <a href="{{ url('teacher/sections') }}"><i class="fas fa-chalkboard"></i><span class="right-nav-text">{{ trans('dashboardes/teacher.Section') }}</span></a>
        </li>
        <!-- الطلاب-->
        <li>
            <a href="{{ url('teacher/students') }}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">{{ trans('dashboardes/teacher.Students') }}</span></a>
        </li>


        <!-- الامتحانات-->
        <li>
            <a href="{{ url('teacher/Quize') }}"><i class="fas fa-book-open"></i><span class="right-nav-text">{{ trans('dashboardes/teacher.Exames') }}</span></a>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">

                <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">{{ trans('dashboardes/teacher.Reports') }}</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ url('teacher/report_attendance') }}">{{ trans('dashboardes/teacher.Report Attendance and Absence') }}  </a></li>
            <li><a href="#">{{ trans('dashboardes/teacher.Report Exame ') }}</a></li>
            </ul>

        </li>
        <!-- الملف الشخصي-->
        <li>
            <a href="{{ url('teacher/profile') }}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{ trans('dashboardes/teacher.Profile') }} </span></a>
        </li>

    </ul>
</div>
