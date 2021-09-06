<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('app.name', 'New Reader Media'))</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('storage/logos/NRMag-blacklogo.png')}}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('plugins/mdbootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  -->
    <script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            font-family: 'Montserrat' !important;
            font-weight: 400 !important;
            padding-right: 0px !important;
        }

        .bg-red {
            background-color: #c01f22;
            color: #fff;
        }

        .text-red-light {
            color: #c0503a;
        }

        .bg-red-light {
            background-color: #c0503a;
            color: #fff;
        }
    </style>

    @stack('css')
</head>

<body style="padding-right: 0px!important;">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white heavy-rain-gradient">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link black-text" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-red-light gotham-reg px-sm-0 pl-md-1 pr-md-3 new" data-toggle="modal" data-target="#createblog">CREATE BLOG</a>
                </li>
                <li class="nav-item font gotham-medium dropdown" id="user-drop">

                    <a class="nav-link dropdown-toggle text-red-light pl-sm-0 pl-md-3" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <li class="bg-red">
                            <a class="dropdown-item bg-red text-red-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar heavy-rain-gradient elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('administrator') }}" class="brand-link">
                <!-- <span class="brand-text text-black font-weight-bolder text-center">New Reader Media</span> -->
                <a class="pl-3 font-weight-bolder">
                    <img src="{{ asset('storage/logos/NRMag-blacklogo.png')}}" style="width:50px;">
                    <b class="pl-2">Admin</b> | {{ Auth::user()->name }}
                </a>
            </a>
            <!-- <a class="navbar-brand font-weight-bold title " href="{{ url('/') }}">
            </a> -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    </div>
                    <div class="info">
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @if(Auth::user()->is_verified != 6)
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/administrator" class="nav-link">
                                <i class="text-red-light nav-icon fas fa-tachometer-alt"></i>
                                <p class="black-text font-weight-bolder">
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="text-red-light nav-icon fas fa-blog"></i>
                                <p class="black-text font-weight-bolder">
                                    Blogs
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/administrator/nmagazine" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="black-text font-weight-bolder">NMagazine</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/administrator/users" class="nav-link">
                                <i class="text-red-light nav-icon fas fa-user"></i>
                                <p class="black-text font-weight-bolder">
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/administrator/references" class="nav-link">
                                <i class="text-red-light nav-icon fas fa-list"></i>
                                <p class="black-text font-weight-bolder">
                                    References
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endif
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            <create-blog></create-blog>

            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer black-text">
            <strong>Copyright &copy; {{date('Y')}} <a class="text-red-light" href="https://www.newreadermagazine.com/">New Reader Magazine</a>.</strong>
            <b>All rights reserved.</b>
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.0.5 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- <script src="{{ asset('plugins/js/admin.js') }}') }}"></script> -->
    <script src="{{ asset('plugins/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/admin-lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/admin-lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('plugins/admin-lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE App -->
    <script>
        $(document).ready(function() {
            /*  $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');*/
        });
        $('#user-drop a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
            }
            var $subMenu = $(this).next('.dropdown-menu');
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass('show');
            });
            return false;
        });
    </script>
    @stack('scripts')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

</body>

</html>
