<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - ImMYapriadi</title>
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="brand brand-dark" href="{{ route('home') }}">
                <span class="brand-mark">IM</span>
                <span>Admin Panel</span>
            </a>

            <nav class="sidebar-nav">
                <a class="active" href="{{ route('admin.news.index') }}">Kelola Berita</a>
                <a href="{{ route('home') }}">Lihat Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link danger">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="admin-content">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>