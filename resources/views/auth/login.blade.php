<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>input:focus{outline:none;box-shadow:0 0 0 4px rgba(59,130,246,0.15);border-color:#3b82f6}</style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm p-6">
        <h1 class="text-2xl font-semibold mb-4">Sign in</h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-slate-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded px-3 py-2">Sign in</button>
            </div>
        </form>

        <p class="mt-4 text-sm text-slate-600">No account? <a href="{{ route('register') }}" class="text-blue-600">Register</a></p>
    </div>
</body>
</html>