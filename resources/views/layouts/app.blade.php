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
    <link href="{{ asset('assets/css/united.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .well, .panel, .panel-heading, .jumbotron, .btn {
            border-radius: 0px;
        }
        body {
            background-color: #eee; 
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li @if($active_menu == 'dashboard') class="active" @endif><a href="{{ route('login') }}">Dashboard</a></li>
                            <li @if($active_menu == 'case') class="active" @endif><a href="{{ route('case.all') }}">Case</a></li>
                            <li @if($active_menu == 'victims') class="active" @endif><a href="{{ route('victim.all') }}">Victims</a></li>
                            <li @if($active_menu == 'suspects') class="active" @endif><a href="{{ route('suspect.all') }}">Suspects</a></li>
                            <li @if($active_menu == 'reports') class="active" @endif><a href="{{ route('reports') }}">Reports</a></li>
                            <li class="dropdown @if($active_menu == 'account') active @endif">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li @if($active_submenu == 'profile') class="active" @endif><a href="{{ route('user.profile') }}">My Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-xs-4 col-xs-offset-8"> 
                    @if(session()->has('status'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <u>{{ session()->get('status') }}</u>
                        </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-validate-v1.17.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
