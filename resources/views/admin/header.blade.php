<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">

    <!-- Custom fonts for this template-->
    <link href="sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CK editor 4 installed-->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <link rel="stylesheet" href="css/toastr.min.css" type="text/css">

    <link href="css/select2.min.css" rel="stylesheet" />

    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome-->
    {{-- <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css"> --}}
    <style>
        .swal-overlay {
            background-color: rgba(229, 245, 241, 0.45);
        }

        .swal-modal {
            border: 3px solid rgb(193, 177, 177);
        }

        .swal-text {
            background-color: #FEFAE3;
            padding: 17px;
            border: 1px solid #F0E1A1;
            display: block;
            margin: 22px;
            text-align: center;
            color: #61534e;
        }
    </style>

</head>

@can('user')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}

            <!-- Heading -->
            {{-- <div class="sidebar-heading">
                Interface
            </div> --}}

            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{ route('button') }}">Buttons</a>
            <a class="collapse-item" href="{{ route('card') }}">Cards</a>
    </div>
    </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ route('color') }}">Colors</a>
    <a class="collapse-item" href="{{ route('border') }}">Borders</a>
    <a class="collapse-item" href="{{ route('animation') }}">Animations</a>
    <a class="collapse-item" href="{{ route('orther') }}">Other</a>
    </div>
    </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manager
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ route('loginadmin') }}">Login</a>
    <a class="collapse-item" href="{{ route('signup') }}">Register</a>
    <a class="collapse-item" href="{{ route('forgotpassword') }}">Forgot Password</a>
    <div class="collapse-divider"></div>
    <h6 class="collapse-header">Other Pages:</h6>
    <a class="collapse-item" href="{{ route('error404') }}">404 Page</a>
    <a class="collapse-item" href="{{ route('blank') }}">Blank Page</a>
    </div>
    </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('chart') }}">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('table') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span></a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('nhanvien.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Staff Manager</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ts.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Timesheets</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ws.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Work Shift</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cv.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Position</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Manager User</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('bs.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Base Salary</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dxp.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sabbatical Leave</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        @endcan