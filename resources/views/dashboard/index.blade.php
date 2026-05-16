<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="max-w-6xl mx-auto p-6">
        <header class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
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
        </header>

        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <div class="space-y-3 text-slate-700 text-sm">
                    <a href="{{ route('admission.create') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Submit Admission</a>
                    @if($user->role === 'admin' || $user->role === 'staff')
                        <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Review Admissions</a>
                    @endif
                    <a href="{{ route('quick.reference') }}" class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50">Quick Reference</a>
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
    </div>
</body>
</html>