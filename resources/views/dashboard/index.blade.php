<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ url('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
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
            <div class="sidebar-brand-text mx-3">Admissions <sup>Portal</sup></div>
        </a>

        <hr class="sidebar-divider my-0">

        @include('partials.nav')

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="{{ url('startbootstrap-sb-admin-2-gh-pages/img/undraw_rocket.svg') }}" alt="...">
            <p class="text-center mb-2"><strong>SB Admin 2</strong> is ready for your portal!</p>
        </div>
    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }}</span>
                            <span class="img-profile rounded-circle" style="width:32px;height:32px;display:inline-flex;align-items:center;justify-content:center;background:#4e73df;color:white;font-weight:700;">{{ strtoupper(substr($user->name,0,1)) }}</span>
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
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Welcome, {{ $user->name }}</h1>
                    <div class="d-flex gap-2">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-light">Home</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-xl-4 col-lg-5 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header font-weight-bold text-primary">Quick Actions</div>
                            <div class="card-body">
                                @if($user->role === 'admin')
                                    <a href="{{ route('admin.admissions.index') }}" class="btn btn-block btn-light mb-2">Manage Admissions</a>
                                    <a href="{{ route('admin.courses.index') }}" class="btn btn-block btn-light mb-2">Manage Courses</a>
                                    <a href="{{ route('admin.centers.index') }}" class="btn btn-block btn-light mb-2">Assessment Centers</a>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-light">Manage Users</a>
                                @elseif($user->role === 'staff')
                                    <a href="{{ route('admin.admissions.index') }}" class="btn btn-block btn-light mb-2">Review Assigned Admissions</a>
                                @else
                                    <a href="{{ route('admission.create') }}" class="btn btn-block btn-light mb-2">Submit Admission</a>
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-block btn-light">View Application Status</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header font-weight-bold text-primary">Your role overview</div>
                            <div class="card-body">
                                <p class="mb-2 text-gray-800">Role: <span class="font-weight-bold">{{ $user->role }}</span></p>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <h6 class="font-weight-bold">Access</h6>
                                            <p class="small mb-0">You are signed in as a <strong>{{ $user->role }}</strong>.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <h6 class="font-weight-bold">Application Status</h6>
                                            <p class="small mb-0">Use the sidebar to navigate to your allowed sections.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3 border rounded">
                                    <h6 class="font-weight-bold mb-2">Role-specific tools</h6>
                                    <ul class="mb-0">
                                        @if($user->role === 'admin')
                                            <li>Full admin access to admissions and system management.</li>
                                            <li>Review all applications and update statuses.</li>
                                        @elseif($user->role === 'staff')
                                            <li>Review applications and manage staff tasks.</li>
                                            <li>View application details and update remarks.</li>
                                        @else
                                            <li>Submit admission applications.</li>
                                            <li>View your user profile and manage your own account.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ date('Y') }} {{ config('app.name','TESDA Assessment Portal') }}</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
