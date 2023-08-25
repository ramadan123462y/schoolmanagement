<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('parent/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('dashboardes/parent.Dashboard') }}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('dashboardes/parent.Dashboard') }}</li>


        <!-- الابناء-->
        <li>
            <a href="{{ url('parent/dashboard') }}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{ trans('dashboardes/parent.Parents') }}</span></a>
        </li>

        <!-- تقرير الحضور والغياب-->
        <li>
            <a href="{{ url('parent/attendance') }}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{ trans('dashboardes/parent.Report Attendance') }}  </span></a>
        </li>

        <!-- تقرير المالية-->
        <li>
            <a href="{{ url('parent/fees') }}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{ trans('dashboardes/parent.Report Fees') }} </span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{ url('parent/profile') }}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('dashboardes/parent.Profile') }} </span></a>
        </li>

    </ul>
</div>
