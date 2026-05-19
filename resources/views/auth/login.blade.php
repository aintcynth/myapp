<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Admission') }} — Login</title>
    <style>
        :root{color-scheme:light dark}
        *,*::before,*::after{box-sizing:border-box}
        html{font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;background:#f1f5f9;color:#0f172a}
        body{margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem;background:#f1f5f9}
        .card{width:100%;max-width:420px;background:#ffffff;border:1px solid #e2e8f0;border-radius:1.25rem;box-shadow:0 24px 45px rgba(15,23,42,.08);padding:2rem}
        h1{margin:0 0 1rem;font-size:2rem;line-height:1.1}
        label{display:block;margin:.95rem 0 .35rem;font-size:.95rem;color:#334155}
        input{width:100%;padding:.95rem 1rem;border:1px solid #cbd5e1;border-radius:.85rem;font:1rem/1.5 system-ui, sans-serif;color:#0f172a}
        input:focus{outline:none;border-color:#6366f1;box-shadow:0 0 0 4px rgba(99,102,241,.15)}
        button{width:100%;padding:1rem;border:none;border-radius:.85rem;background:#334155;color:#fff;font:1rem/1.5 system-ui, sans-serif;font-weight:700;cursor:pointer}
        button:hover{background:#1f2937}
        .feedback{margin-bottom:1rem;padding:1rem;border-radius:.85rem;background:#fee2e2;color:#991b1b;font-size:.95rem}
        .note{margin-top:1.5rem;font-size:.95rem;color:#475569}
        .link{color:#4f46e5;text-decoration:none}
    </style>
</head>
<body>
    <div class="card">
        <h1>Sign in</h1>

        @if ($errors->any())
            <div class="feedback">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" autocomplete="username" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>

            <button type="submit">Sign in</button>
        </form>

        <p class="note">Need an account? <a class="link" href="{{ route('register') }}">Create one</a></p>
    </div>
</body>
</html>