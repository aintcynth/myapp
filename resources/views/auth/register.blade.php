<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm p-6">
        <h1 class="text-2xl font-semibold mb-4">Create account</h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-slate-700 mb-1">Name</label>
                <input type="text" name="name" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-slate-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm text-slate-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded px-3 py-2">Create account</button>
            </div>
        </form>

        <p class="mt-4 text-sm text-slate-600">Have an account? <a href="{{ route('login') }}" class="text-blue-600">Sign in</a></p>
    </div>
</body>
</html>