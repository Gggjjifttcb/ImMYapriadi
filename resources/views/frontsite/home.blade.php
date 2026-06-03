@extends('layouts.public')

@section('title', 'Beranda - ImMYapriadi')

@section('content')
    <section class="hero-grid">
        <article class="hero-card">
            <p class="eyebrow"><span class="eyebrow-dot"></span> Website sederhana siap pakai</p>
            <h1>Frontsite, login admin, dan CRUD berita dalam satu aplikasi Laravel.</h1>
            <p class="lead">
                Struktur ini cocok untuk profil usaha, personal brand, atau website informasi yang butuh halaman publik dan panel admin yang ringan.
            </p>

            <div class="hero-actions">
                <a class="btn btn-primary" href="#berita">Lihat berita</a>
                <a class="btn btn-secondary" href="{{ route('login') }}">Masuk admin</a>
            </div>

            <div class="stats-grid">
                <div><strong>Frontsite</strong><span>Halaman publik yang rapi</span></div>
                <div><strong>Login</strong><span>Akses admin terpisah</span></div>
                <div><strong>CRUD</strong><span>Kelola berita dengan cepat</span></div>
            </div>
        </article>

        <aside class="side-card">
            <p class="section-label">Kenapa sederhana?</p>
            <ul class="feature-list">
                <li>Mudah dipahami dan cepat dikembangkan</li>
                <li>Tampilan bersih untuk desktop dan mobile</li>
                <li>Struktur admin langsung fokus ke konten</li>
            </ul>
        </aside>
    </section>

    <section id="berita" class="section-block">
        <div class="section-head">
            <div>
                <p class="section-label">Berita terbaru</p>
                <h2>Konten publik yang diambil dari panel admin.</h2>
            </div>

            <a class="text-link" href="{{ route('login') }}">Kelola konten</a>
        </div>

        <div class="news-grid">
            @forelse ($featuredNews as $item)
                <article class="news-card">
                    <p class="news-meta">{{ optional($item->published_at)->translatedFormat('d M Y') ?? 'Belum dipublikasikan' }}</p>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->excerpt }}</p>
                    <a class="text-link" href="{{ route('news.show', $item) }}">Baca selengkapnya</a>
                </article>
            @empty
                <div class="empty-state">Belum ada berita yang dipublikasikan.</div>
            @endforelse
        </div>
    </section>

    <section class="section-block split-layout">
        <div>
            <p class="section-label">Cocok untuk</p>
            <h2>Website perusahaan kecil, media internal, atau personal brand.</h2>
        </div>

        <div class="timeline">
            <div>
                <strong>01</strong>
                <p>Pengunjung melihat berita terbaru di halaman depan.</p>
            </div>
            <div>
                <strong>02</strong>
                <p>Admin login untuk menambah atau mengubah berita.</p>
            </div>
            <div>
                <strong>03</strong>
                <p>Konten langsung tampil kembali di frontsite.</p>
            </div>
        </div>
    </section>
@endsection