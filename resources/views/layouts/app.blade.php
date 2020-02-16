@inject('function', 'App\Helpers\Functions')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>File Service</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Orbitron|Oswald|Raleway|Roboto');
    </style>
    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                            <li class="single-item-left"><a href=""><span class="nav-icon fa fa-reply fa-lg"></span> Back to </a></li>
                            <li class="single-item-left"><a href="{{ url('/') }}"><span class="nav-icon fa fa-home fa-lg"></span> Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="single-item-right"><a href="{{ route('login') }}"><span class="nav-icon fa fa-user fa-lg"></span> Login</a></li>
                            <li class="single-item-right"><a href="{{ route('register') }}"><span class="nav-icon fa fa-user-plus fa-lg"></span> Register</a></li>
                        @else
                        @if (Auth::user()->role == 1)
                            <li class="single-item-right"><a href="{{ route('admin') }}"><span class="nav-icon fa fa-user-secret fa-lg"></span> Admin Panel</a></li>
                        @endif
                            <li class="single-item-right"><a href="{{ route('dashboard') }}"><span class="nav-icon fa fa-cube fa-lg"></span> Dashboard</a></li>
                            <li class="single-item-right"><a href="{{ route('buycredits') }}"><span class="nav-icon fa fa-database fa-lg"></span> Credits: <span class="@if (Auth::user()->credits > 0) credits-plus @else credits-zero @endif">{{ Auth::user()->credits }}</span></a></li>
                            <li class="dropdown account">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-icon fa fa-user-circle fa-lg"></span> {{ Auth::user()->name }} <span style="margin-left: 10px;" class="fa fa-chevron-down"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{ $function->dr_link_active('dashboard/account') }}">
                                        <a href="{{ route('account.view') }}">
                                            Edit Account
                                        </a>
                                    </li>
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
                        <li class="single-item-right"><a href="{{ route('tickets') }}"><span class="nav-icon fa fa-question fa-lg"></span> Help</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>
