<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Admissions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-8">
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold">Admission Applications</h1>
                    <p class="text-sm text-slate-600">Route applications to staff and assign assessment centers.</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-sm text-slate-700 shadow-sm hover:bg-slate-50">Back to Admin Dashboard</a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Center</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned Staff</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Remarks</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($admissions as $admission)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admission->full_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admission->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admission->course ?: $admission->courseItem?->name ?: 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admission->assessmentCenter?->name ?? 'Unassigned' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admission->assignedStaff?->name ?? 'Unassigned' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.admissions.update', $admission) }}" method="POST" class="space-y-3">
                                        @csrf
                                        @method('POST')
                                        <div>
                                            <select name="status" class="w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="pending" {{ $admission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="under_review" {{ $admission->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                                <option value="approved" {{ $admission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="rejected" {{ $admission->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                        @if(auth()->user()->role === 'admin')
                                            <div>
                                                <select name="assigned_to" class="w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Assign staff</option>
                                                    @foreach($staffUsers as $staff)
                                                        <option value="{{ $staff->id }}" {{ $admission->assigned_to == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <select name="assessment_center_id" class="w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Choose assessment center</option>
                                                    @foreach($centers as $center)
                                                        <option value="{{ $center->id }}" {{ $admission->assessment_center_id == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <textarea name="remarks" rows="2" class="w-full rounded border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $admission->remarks }}</textarea>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="submit" class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>