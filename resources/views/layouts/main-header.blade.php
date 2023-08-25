        <!--=================================
 header start-->
        {{-- style logo  --}}
        <style>
            .logo {
                display: flex;
                align-items: center;
                font-size: 24px;
                background-color: white;
                opacity: 0.9;
            }

            .logo-text {
                margin: 0;
                padding: 0;
                color: green;
                font-weight: bold;
            }
        </style>
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="logo">
                <h3 class="logo-text">School System</h3>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">


                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <div class="btn-group mb-1">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'ar')
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                        @else
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                        @endif
                    </button>
                    <div class="dropdown-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                <li class="nav-item">
                    @if (auth('student')->check())
                        <form method="post" action="{{ url('auth/destroy', 'student') }}">
                        @elseif(auth('teacher')->check())
                            <form method="post" action="{{ url('auth/destroy', 'teacher') }}">
                            @elseif(auth('parent')->check())
                                <form method="post" action="{{ url('auth/destroy', 'parent') }}">
                                @else
                                    <form method="post" action="{{ url('auth/destroy', 'web') }}">
                    @endif

                    @csrf
                    <button id="btnFullscreen" class="nav-link">
                        <i class="fa-sharp fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #1f5127;"></i>
                    </button>
                    </form>
                </li>






                <li class="nav-item dropdown mr-30">
                    @if (auth('student')->check())
                        <a class="nav-link nav-pill user-avatar" href="{{ url('student/profile') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">


                        </a>
                    @elseif(auth('teacher')->check())
                        <a class="nav-link nav-pill user-avatar" href="{{ url('teacher/profile') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">


                        </a>
                    @elseif(auth('parent')->check())
                        <a class="nav-link nav-pill user-avatar" href="{{ url('parent/profile') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">


                        </a>
                    @else
                        <a class="nav-link nav-pill user-avatar" href="" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">


                        </a>
                    @endif



                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
        <!--=================================
header start-->

        <!--=================================
header End-->
