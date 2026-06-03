@extends('layouts.public')

@section('title', $news->title.' - ImMYapriadi')

@section('content')
    <section class="article-layout">
        <article class="article-card">
            <p class="section-label">Berita</p>
            <h1 class="article-title">{{ $news->title }}</h1>
            <p class="article-meta">{{ optional($news->published_at)->translatedFormat('d M Y, H:i') ?? 'Belum dipublikasikan' }}</p>
            <p class="lead">{{ $news->excerpt }}</p>
            <div class="article-body">{!! nl2br(e($news->content)) !!}</div>
        </article>

        <aside class="side-card">
            <p class="section-label">Berita lain</p>

            <div class="related-list">
                @forelse ($latestNews as $item)
                    <a href="{{ route('news.show', $item) }}">
                        <strong>{{ $item->title }}</strong>
                        <span>{{ $item->excerpt }}</span>
                    </a>
                @empty
                    <div class="empty-state">Tidak ada berita lain.</div>
                @endforelse
            </div>
        </aside>
    </section>
@endsection