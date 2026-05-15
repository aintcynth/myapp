<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white px-6 py-4 shadow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">User Dashboard</h1>
            <div>
                <span class="mr-4">Welcome, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Profile</h2>
                <p class="mb-2"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p class="mb-2"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p class="mb-2"><strong>Role:</strong> <span class="capitalize">{{ auth()->user()->role }}</span></p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Quick Links</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('admission.create') }}" class="text-blue-500 hover:underline">Apply for Admission</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>