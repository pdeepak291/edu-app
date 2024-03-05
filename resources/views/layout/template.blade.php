<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title') | {{ config('app.name') }}</title>
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="{{ asset('template/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('template/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="{{ asset('template/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/css/custom.css') }}" />
        @yield('styles')
    </head>
    <body class="navbar-fixed sidebar-fixed" id="body">
        <div class="wrapper">
            <aside class="left-sidebar sidebar-dark" id="left-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">
                    <!-- Aplication Brand -->
                    <div class="app-brand">
                        <a href="{{ route('admin.home') }}">
                            <span class="brand-name">{{ config('app.name') }}</span>
                        </a>
                    </div>
                    <!-- begin sidebar scrollbar -->
                    <div class="sidebar-left" data-simplebar style="height: 100%;">
                        <!-- sidebar menu -->
                        {!! usermenus() !!}
                        {{-- <ul class="nav sidebar-inner" id="sidebar-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ route('user.home') }}">
                                    <i class="mdi mdi-briefcase-account-outline"></i>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </aside>
            <div class="page-wrapper">
                <!-- Header -->
                <header class="main-header" id="header">
                    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                        <!-- Sidebar toggle button -->
                        <button id="sidebar-toggler" class="sidebar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <span class="page-title">@yield('heading')</span>
                        <div class="navbar-right ">
                            <ul class="nav navbar-nav">
                                <!-- User Account -->
                                <li class="dropdown user-menu">
                                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" />
                                        <span class="d-none d-lg-inline-block">John Doe</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-link-item" href="{{ route('admin.profile') }}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-footer">
                                            <a class="dropdown-link-item" href="{{ route('admin.logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <div class="content-wrapper">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('template/js/mono.js') }}"></script>
        <script src="{{ asset('template/js/custom.js') }}"></script>
        @yield('scripts')
    </body>
</html>