<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Admissions</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Admission Applications</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
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
                            <td class="px-6 py-4 whitespace-nowrap">{{ $admission->course ?: 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.admissions.update', $admission) }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <select name="status" class="border rounded px-2 py-1">
                                        <option value="pending" {{ $admission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="under_review" {{ $admission->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="approved" {{ $admission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $admission->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <textarea name="remarks" rows="2" class="border rounded px-2 py-1 w-full">{{ $admission->remarks }}</textarea>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>