<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="min-h-screen lg:flex">
        <aside id="dashboard-sidebar" class="fixed inset-y-0 left-0 z-30 w-72 transform -translate-x-full overflow-y-auto border-r border-slate-200 bg-white p-6 shadow-xl transition duration-300 lg:static lg:translate-x-0 lg:shadow-none">
            <div class="mb-10">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl bg-red-600 text-white grid place-items-center font-bold">A</div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.32em] text-slate-500">Admin</p>
                        <p class="text-lg font-semibold text-slate-900">Dashboard</p>
                    </div>
                </a>
            </div>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 font-semibold text-slate-900">Overview</a>
                <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Admissions</a>
                <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Home</a>
            </nav>
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
                        <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Admin Dashboard</p>
                        <h1 class="text-4xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
                        <p class="mt-2 text-slate-600">Role: <span class="font-semibold capitalize">{{ auth()->user()->role }}</span></p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg border bg-white text-slate-900 hover:bg-slate-100">Home</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Logout</button>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-6 md:grid-cols-3">
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                        <h2 class="text-xl font-bold mb-4">Profile</h2>
                        <p class="mb-2"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p class="mb-2"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p class="mb-2"><strong>Role:</strong> <span class="capitalize">{{ auth()->user()->role }}</span></p>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                        <h2 class="text-xl font-bold mb-4">Admin Functions</h2>
                        <ul class="space-y-2">
                            <li><a href="{{ route('admin.admissions.index') }}" class="text-blue-500 hover:underline">Manage Admissions</a></li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                        <h2 class="text-xl font-bold mb-4">System</h2>
                        <p class="text-slate-600">Full system administration access</p>
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