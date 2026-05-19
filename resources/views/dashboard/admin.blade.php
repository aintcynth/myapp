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
        <aside class="bg-white border-r border-slate-200 px-6 py-8 lg:w-80">
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
                <a href="{{ route('quick.reference') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Quick Reference</a>
                <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Home</a>
            </nav>
        </aside>

        <main class="flex-1 p-6 lg:p-10">
            <header class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
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
            </header>

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
</body>
</html>