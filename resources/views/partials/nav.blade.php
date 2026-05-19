@php
    $user = auth()->user();
@endphp

<nav class="space-y-2 text-sm">
    {{-- Common link(s) --}}
    <a href="{{ route('dashboard') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 font-semibold text-slate-900">Overview</a>

    @if($user && $user->role === 'user')
        <a href="{{ route('admission.create') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Submit Admission</a>
        <a href="{{ route('user.dashboard') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">View Application Status</a>
    @endif

    @if($user && ($user->role === 'admin' || $user->role === 'staff'))
        <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Review Admissions</a>
    @endif

    @if($user && $user->role === 'admin')
        <a href="{{ route('admin.courses.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Courses</a>
        <a href="{{ route('admin.centers.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Assessment Centers</a>
        <a href="{{ route('admin.users.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Users</a>
    @endif

    <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Home</a>
</nav>

