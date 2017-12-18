<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    
    <link rel="icon" href="{{ URL::asset('assets/img/logo.png_32x32.png') }}" type="image/png">
    <!-- Styles -->
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/footable/footable.core.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/toastr/toastr.min.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/slick/slick.css') }} " rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/slick/slick-theme.css') }} " rel="stylesheet">
</head>

<body class="skin-3">

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img alt="image" class="img-thumbnail" src="{{ asset('assets/img/logo.png_96x96.png') }}" />
                        </span>
                    </div>
                    <div class="logo-element">
                        PNP
                    </div>
                </li>
                @if(Auth::check())

                    <li @if($active_menu == 'dashboard') class="active" @endif><a href="{{ route('login') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>

                    @if(Auth::user()->user_type_id == 1)
                        
                        <li @if($active_submenu == 'users') class="active" @endif><a href="{{ route('users.all') }}"><i class="fa fa-user-secret"></i> <span class="nav-label"> Officers</span></a></li>

                        <li @if($active_menu == 'crimes') class="active" @endif>
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Crime Management </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse @if($active_menu == 'crimes') in @endif">
                                <li @if($active_submenu == 'crime_type') class="active" @endif><a href="{{ route('crime.type.all') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Crime Types</span></a></li>
                                <li @if($active_submenu == 'crime_category') class="active" @endif><a href="{{ route('crime.category.all') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Crime Categories</span></a></li>
                                <li @if($active_submenu == 'crime_classification') class="active" @endif><a href="{{ route('crime.classification.all') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Crime Classifications</span></a></li>
                            </ul>
                        </li>
                    @else                  

                        <li @if($active_menu == 'case') class="active" @endif><a href="{{ route('case.all') }}"><i class="fa fa-folder"></i> <span class="nav-label"> Case</span></a></li>
                        <li @if($active_menu == 'victims') class="active" @endif><a href="{{ route('victim.all') }}"><i class="fa fa-address-book"></i> <span class="nav-label"> Victims</span></a></li>
                        <li @if($active_menu == 'suspects') class="active" @endif><a href="{{ route('suspect.all') }}"><i class="fa fa-address-book"></i> <span class="nav-label"> Suspects</span></a></li>

                    @endif           
                    
                    <li @if($active_menu == 'reports') class="active" @endif><a href="{{ route('reports') }}"><i class="fa fa-th-large"></i> <span class="nav-label"> Reports</span></a></li>

                @endif
{{--                 <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html">Inbox</a></li>
                        <li><a href="mail_detail.html">Email view</a></li>
                        <li><a href="mail_compose.html">Compose email</a></li>
                        <li><a href="email_template.html">Email templates</a></li>
                    </ul>
                </li>
            </ul> --}}

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                    <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                      
                        <li @if($active_submenu == 'profile') class="active" @endif>
                           
                            <a href="{{ route('user.profile') }}">Profile</a>
                           
                        </li>
                        @if(Auth::user()->user_type_id == 1)
                        <li @if($active_submenu == 'users') class="active" @endif>
                            <a href="{{ route('users.all') }}">Users (Officer)</a>
                        </li>
                        @endif            
                    </ul>
                </li>
                </li>
                    
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                </ul>
            </nav>
        </div>


        @yield('content')


        <div class="footer fixed">
            <div class="pull-right">
                
            </div>
            <div>
                Reserved @ PNP: Crime-Management System - Cagayan de Oro City, 2014-2017
            </div>
        </div>
    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/footable/footable.all.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

            $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            @if(session()->has('status') && session()->get('status') == true)
                
                    // Display a success toast, with a title
                    toastr.success('Action: Ok');
                
            @elseif(session()->has('status') && session()->get('status') == false)
                
                    // Display a success toast, with a title
                    toastr.error('Action: Error');
                
            @endif
        });

    </script>
</body>
</html>
