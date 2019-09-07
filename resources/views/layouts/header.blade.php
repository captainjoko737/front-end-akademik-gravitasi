<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('/public/assets/images/logo_akbid.png') }}" width="30px" alt="" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('/public/assets/images/logo_akbid.png') }}" width="30px" alt="" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                 <!-- dark Logo text -->
                 <img src="{{ asset('/public/assets/images/akademikakbid.png') }}" width="200px" alt="homepage" class="dark-logo" />
                 <!-- Light Logo text -->    
                 <img src="{{ asset('/public/assets/images/akademikakbid.png') }}" width="200px" class="light-logo" alt="homepage" /></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Search -->
                
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ session('photo_profile') }}" width="30px" height="30px" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ session('photo_profile') }}" width="60" height="60" alt="suser"></div>
                                    <div class="u-text">
                                        @if ( session('user')['status_user'] != 'admin')
                                            <h4>{{ session('user')['nama'] }}</h4>
                                        @else
                                            <h4>{{ session('user')['username'] }}</h4>
                                        @endif
                                        
                                        @if ( session('user')['status_user'] == 'dosen')
                                            <p class="text-muted">{{ session('user')['nidn'] }}</p></div>
                                        @elseif ( session('user')['status_user'] == 'mahasiswa')
                                            <p class="text-muted">{{ session('user')['nim'] }}</p></div>
                                        @else

                                        @endif
                                </div>
                            </li>

                            @if ( session('user')['status_user'] == 'mahasiswa')
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('mahasiswa.update.profile') }}"><i class="ti-user"></i> Perbarui Data Pribadi</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('mahasiswa.update.photo') }}"><i class="mdi mdi-contacts"></i> Ganti Foto</a></li>
                                <li role="separator" class="divider"></li>
                            @elseif ( session('user')['status_user'] == 'dosen')
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('dosen.update.profile') }}"><i class="ti-user"></i> Perbarui Data Pribadi</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('dosen.update.photo') }}"><i class="mdi mdi-contacts"></i> Ganti Foto</a></li>
                                <li role="separator" class="divider"></li>
                            @else
                                            
                            @endif
                            <li>
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>