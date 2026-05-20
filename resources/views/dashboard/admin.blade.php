<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SB Admin 2 - Admin Dashboard</title>

    <link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3">Admin <sup>Panel</sup></div>
        </a>
        <hr class="sidebar-divider my-0">
        @include('partials.nav')

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                            <span class="img-profile rounded-circle" style="width:32px;height:32px;display:inline-flex;align-items:center;justify-content:center;background:#4e73df;color:white;font-weight:700;">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                Home
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-light">Home</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header font-weight-bold text-primary">Profile</div>
                            <div class="card-body">
                                <p class="mb-2"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                                <p class="mb-2"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                <p class="mb-0"><strong>Role:</strong> {{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header font-weight-bold text-primary">Admin Functions</div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    <li><a href="{{ route('admin.admissions.index') }}">Manage Admissions</a></li>
                                    <li><a href="{{ route('admin.courses.index') }}">Manage Courses</a></li>
                                    <li><a href="{{ route('admin.centers.index') }}">Assessment Centers</a></li>
                                    <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header font-weight-bold text-primary">System</div>
                            <div class="card-body">
                                <p class="text-gray-600 mb-0">Full system administration access</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ date('Y') }} {{ config('app.name','TESDA Assessment Portal') }}</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
