<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Admissions</title>
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
                        <p class="text-lg font-semibold text-slate-900">Admissions</p>
                    </div>
                </a>
            </div>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 font-semibold text-slate-900">Overview</a>
                <a href="{{ route('admin.admissions.index') }}" class="block rounded-2xl bg-slate-100 px-4 py-3 text-slate-900">Manage Admissions</a>
                <a href="{{ route('admin.courses.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Manage Courses</a>
                <a href="{{ route('admin.centers.index') }}" class="block rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50">Assessment Centers</a>
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
                        <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Admission Applications</p>
                        <h1 class="text-4xl font-bold">Admission Applications</h1>
                        <p class="text-sm text-slate-600">Route applications to staff and assign assessment centers.</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-lg border bg-white text-slate-900 hover:bg-slate-100">Back to Admin Dashboard</a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid gap-6">
                    @forelse($admissions as $admission)
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold">{{ $admission->full_name }} <span class="text-sm text-slate-500">({{ $admission->email }})</span></h3>
                                    <p class="text-sm text-slate-600">Course: <span class="font-medium">{{ $admission->course ?: $admission->courseItem?->name ?: 'N/A' }}</span></p>
                                    <p class="text-sm text-slate-600">Center: <span class="font-medium">{{ $admission->assessmentCenter?->name ?? 'Unassigned' }}</span></p>
                                    <p class="text-sm text-slate-600">Assigned Staff: <span class="font-medium">{{ $admission->assignedStaff?->name ?? 'Unassigned' }}</span></p>
                                </div>
                                <div class="w-64">
                                    <form action="{{ route('admin.admissions.update', $admission) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div>
                                            <label class="block text-xs text-slate-500">Status</label>
                                            <select name="status" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="pending" {{ $admission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="under_review" {{ $admission->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                                <option value="approved" {{ $admission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="rejected" {{ $admission->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                        @if(auth()->user()->role === 'admin')
                                            <div>
                                                <label class="block text-xs text-slate-500">Assign Staff</label>
                                                <select name="assigned_to" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Assign staff</option>
                                                    @foreach($staffUsers as $staff)
                                                        <option value="{{ $staff->id }}" {{ $admission->assigned_to == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-xs text-slate-500">Assessment Center</label>
                                                <select name="assessment_center_id" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Choose assessment center</option>
                                                    @foreach($centers as $center)
                                                        <option value="{{ $center->id }}" {{ $admission->assessment_center_id == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div>
                                            <label class="block text-xs text-slate-500">Remarks</label>
                                            <textarea name="remarks" rows="2" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $admission->remarks }}</textarea>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                            <p class="text-slate-600">No admission applications found.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>
</body>
</html>