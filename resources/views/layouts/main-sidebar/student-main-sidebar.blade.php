<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('student/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('dashboardes/studentDashboard.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
            {{ trans('dashboardes/studentDashboard.Programname') }} </li>
        <!-- الامتحانات-->
        <li>
            <a href="{{ url('student/exames') }}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{ trans('dashboardes/studentDashboard.Exames') }}</span></a>
        </li>
        <!-- Settings-->
        <li>
            <a href="{{ url('student/profile') }}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">
                    {{ trans('dashboardes/studentDashboard.Profile') }}</span></a>
        </li>
        <li>
            <a href="{{ url('student/subjects') }}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">
                    {{ trans('dashboardes/studentDashboard.Subjects') }} </span></a>
        </li>
        <li>
            <a href="{{ url('student/books') }}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">
                    {{ trans('dashboardes/studentDashboard.library') }} </span></a>
        </li>

    </ul>
</div>
