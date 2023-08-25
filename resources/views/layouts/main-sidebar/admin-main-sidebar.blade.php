
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('admin/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Dashboard') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('layouts/main-sidebar.Programname') }}
                    </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('grades') }}">{{ trans('layouts/main-sidebar.Grades_list') }}</a></li>

                        </ul>
                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.classes') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('classroom') }}">{{ trans('layouts/main-sidebar.List_classes') }}</a>
                            </li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">

                            <div class="pull-left">
                                <i class="fas fa-chalkboard"></i>
                                </i><span class="right-nav-text">{{ trans('layouts/main-sidebar.sections') }}
                                </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('section') }}">{{ trans('layouts/main-sidebar.List_sections') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- --------- --}}

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Student_information') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Student_information" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ url('student/add_student') }}">{{ trans('layouts/main-sidebar.Add Student') }}</a>
                            </li>
                            <li> <a href="{{ url('student') }}">{{ trans('layouts/main-sidebar.List Student') }}</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Students_Promotions') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Students_upgrade" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ url('promotion/') }}">{{ trans('layouts/main-sidebar.add_Promotion') }}</a>
                            </li>
                            <li> <a
                                    href="{{ url('promotion/create') }}">{{ trans('layouts/main-sidebar.list_Promotions') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_g">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Graduate_students') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Students_g" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ url('graduate/create') }}">{{ trans('layouts/main-sidebar.add_Graduate') }}</a>
                            </li>
                            <li> <a href="{{ url('graduate') }}">{{ trans('layouts/main-sidebar.list_Graduate') }}</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Teachers') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('teacher') }}">{{ trans('layouts/main-sidebar.List_Teachers') }}</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('parents') }}">{{ trans('layouts/main-sidebar.List Parents') }}</a>
                            </li>
                            <li> <a
                                    href="{{ url('parents/add_parent') }}">{{ trans('layouts/main-sidebar.Add Parents') }}</a>
                            </li>
                        </ul>

                    </li>
                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Accounts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('fees.index') }}">{{ trans('layouts/main-sidebar.Tuition Fees') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('invoice.index') }}">{{ trans('layouts/main-sidebar.Invoices') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('recipt.index') }}">{{ trans('layouts/main-sidebar.Receipts') }}</a>
                            </li>
                            <li> <a href="{{ route('process_fee.index') }}">{{ trans('layouts/main-sidebar.Excluded') }}
                                </a> </li>
                            <li> <a
                                    href="{{ route('payment.index') }}">{{ trans('layouts/main-sidebar.Payments') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Attendance') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('attendance.index') }}">{{ trans('layouts/main-sidebar.List Students') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Subjects') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('subject.index') }}">{{ trans('layouts/main-sidebar.List of Subjects') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Quizzes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#quize">
                            <div class="pull-left">
                                <i class="fas fa-book-open"></i>
                                <span class="right-nav-text">{{ trans('layouts/main-sidebar.Exams') }}</span>
                            </div>
                            <div class="pull-right">
                                <i class="ti-plus"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="quize" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{ route('quize.index') }}">{{ trans('layouts/main-sidebar.Exams List') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('question.index') }}">{{ trans('layouts/main-sidebar.Questions List') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- library-->
                    <li>
                        <a href="{{ route('book.index') }}"  >
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.library') }}</span></div>
                            <div class="pull-right"></i></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>


                    <!-- Onlinec lasses-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Onlineclasses') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li> --}}


                    <!-- Settings-->
                    <li>
                        <a href="{{ url('setting') }}"  >
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Setting') }}</span></div>
                            <div class="pull-right"></i></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>


                    <!-- Users-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                    class="right-nav-text">{{ trans('layouts/main-sidebar.Users') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>  --}}
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
