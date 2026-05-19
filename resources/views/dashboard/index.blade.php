<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="min-h-screen lg:flex">
        <aside id="dashboard-sidebar" class="fixed inset-y-0 left-0 z-30 w-72 transform -translate-x-full overflow-y-auto border-r border-slate-200 bg-white p-6 shadow-xl transition duration-300 lg:static lg:translate-x-0 lg:shadow-none">
            <div class="mb-10">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">A</div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.32em] text-slate-500">Admissions</p>
                        <p class="text-lg font-semibold text-slate-900">Dashboard</p>
                    </div>
                </a>
            </div>
            @include('partials.nav')
        </aside>

        <div class="lg:ml-72 flex-1">
            <main class="p-6 lg:p-10">
                <div class="mb-8 flex items-center justify-between gap-4">
                    <button id="sidebar-toggle" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-900 shadow-sm lg:hidden">
                        <span class="sr-only">Toggle menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Dashboard</p>
                        <h1 class="text-4xl font-bold">Welcome, {{ $user->name }}</h1>
                        <p class="mt-2 text-slate-600">Role: <span class="font-semibold capitalize">{{ $user->role }}</span></p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg border bg-white text-slate-900 hover:bg-slate-100">Home</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Logout</button>
                        </form>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200">
                        <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                                <div class="space-y-3 text-slate-700 text-sm">
                            @if($user->role === 'admin')
                                <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Manage Admissions</a>
                                <a href="{{ route('admin.courses.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Manage Courses</a>
                                <a href="{{ route('admin.centers.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Assessment Centers</a>
                                <a href="{{ route('admin.users.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Manage Users</a>
                            @elseif($user->role === 'staff')
                                <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Review Assigned Admissions</a>
                            @else
                                <a href="{{ route('admission.create') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Submit Admission</a>
                                <a href="{{ route('user.dashboard') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">View Application Status</a>
                            @endif
                        </div>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200 lg:col-span-2">
                        <h2 class="text-xl font-semibold mb-4">Your role overview</h2>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <h3 class="font-semibold mb-2">Access</h3>
                                <p class="text-sm text-slate-700">You are signed in as a <span class="font-semibold capitalize">{{ $user->role }}</span>.</p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4">
                                <h3 class="font-semibold mb-2">Application Status</h3>
                                <p class="text-sm text-slate-700">Use this page to navigate to your allowed sections.</p>
                            </div>
                        </div>

                        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4">
                            <h3 class="text-lg font-semibold mb-3">Role-specific tools</h3>
                            <ul class="list-disc list-inside space-y-2 text-slate-700 text-sm">
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
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('dashboard-sidebar');
        const toggle = document.getElementById('sidebar-toggle');

        if (toggle && sidebar) {
            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('translate-x-0');
            });

            document.addEventListener('click', (event) => {
                const target = event.target;
                if (window.innerWidth < 1024 && !sidebar.contains(target) && !toggle.contains(target)) {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                }
            });
        }
    </script>
</body>
</html>