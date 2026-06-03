<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - ImMYapriadi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="auth-body">
    <div class="auth-backdrop"></div>
    <main class="auth-card">
        <div class="auth-copy">
            <span class="eyebrow">Admin Access</span>
            <h1>Masuk ke panel admin untuk mengelola berita.</h1>
            <p>Gunakan akun admin yang sudah disiapkan saat seeding database.</p>
        </div>

        <form method="POST" action="{{ route('login.store') }}" class="auth-form">
            @csrf

            <label>
                <span>Email</span>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')<small class="form-error">{{ $message }}</small>@enderror
            </label>

            <label>
                <span>Password</span>
                <input type="password" name="password" required>
                @error('password')<small class="form-error">{{ $message }}</small>@enderror
            </label>

            <label class="check-row">
                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <span>Ingat saya</span>
            </label>

            @if ($errors->any())
                <div class="alert alert-error">Email atau password tidak cocok.</div>
            @endif

            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-secondary" href="{{ route('home') }}">Kembali ke situs</a>
        </form>
    </main>
</body>
</html>