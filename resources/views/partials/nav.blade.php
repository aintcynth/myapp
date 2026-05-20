@php
    $user = auth()->user();
@endphp

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Admissions -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span>
    </a>
</li>

@if($user && $user->role === 'user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admission.create') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Submit Admission</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Application Status</span>
        </a>
    </li>
@endif

@if($user && ($user->role === 'admin' || $user->role === 'staff'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.admissions.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Review Admissions</span>
        </a>
    </li>
@endif

@if($user && $user->role === 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.courses.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Manage Courses</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.centers.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Assessment Centers</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage Users</span>
        </a>
    </li>
@endif


