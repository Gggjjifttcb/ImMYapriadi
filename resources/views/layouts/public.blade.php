<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'ImMYapriadi'))</title>
    <meta name="description" content="Website sederhana dengan frontsite, login admin, dan CRUD berita.">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="site-body">
    <div class="site-bg"></div>

    <header class="topbar">
        <div class="container topbar-inner">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">IM</span>
                <span>ImMYapriadi</span>
            </a>

            <nav class="nav-links" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('home') }}#berita">Berita</a>
                <a href="mailto:hello@immyapriadi.com">Kontak</a>
                @auth
                    <a href="{{ route('admin.news.index') }}">Admin</a>
                    <form class="inline-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a class="nav-cta" href="{{ route('login') }}">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container main-shell">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>