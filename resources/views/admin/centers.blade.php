<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Assessment Centers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="min-h-screen lg:flex">
        <aside class="fixed inset-y-0 left-0 z-30 w-72 overflow-y-auto border-r border-slate-200 bg-white p-6 shadow-xl lg:static lg:shadow-none">
            <div class="mb-10">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl bg-red-600 text-white grid place-items-center font-bold">A</div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.32em] text-slate-500">Admin</p>
                        <p class="text-lg font-semibold text-slate-900">Centers</p>
                    </div>
                </a>
            </div>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 font-semibold text-slate-900">Overview</a>
                <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Admissions</a>
                <a href="{{ route('admin.courses.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Courses</a>
                <a href="{{ route('admin.centers.index') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 text-slate-900">Assessment Centers</a>
                <a href="{{ route('admin.users.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Users</a>
                <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Home</a>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left rounded-2xl px-4 py-3 bg-red-600 text-white hover:bg-red-700">Logout</button>
                </form>
            </nav>
        </aside>

        <div class="lg:ml-72 flex-1">
            <main class="p-6 lg:p-10">
                <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Assessment Centers</p>
                        <h1 class="text-4xl font-bold">Manage Assessment Centers</h1>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-lg border bg-white text-slate-900 hover:bg-slate-100">Back to Dashboard</a>
                </div>

                @if (session('success'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-6 lg:grid-cols-[1fr_1.5fr]">
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                        <h2 class="text-xl font-bold mb-4">Add Center</h2>
                        <form action="{{ route('admin.centers.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-slate-700" for="name">Name</label>
                                <input id="name" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700" for="location">Location</label>
                                <input id="location" name="location" value="{{ old('location') }}" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button class="inline-flex items-center rounded-full bg-red-600 px-5 py-3 text-white hover:bg-red-700">Add Center</button>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 overflow-x-auto">
                        <h2 class="text-xl font-bold mb-4">Published Centers</h2>
                        @if($centers->isEmpty())
                            <p class="text-slate-600">No assessment centers are available.</p>
                        @else
                            <table class="min-w-full table-auto">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Location</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200">
                                    @foreach($centers as $center)
                                        <tr>
                                            <td class="px-4 py-3">{{ $center->name }}</td>
                                            <td class="px-4 py-3 text-slate-600">{{ $center->location ?: 'No location set' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
