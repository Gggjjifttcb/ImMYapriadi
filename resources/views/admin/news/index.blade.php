@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="page-head">
        <div>
            <p class="section-label">Admin</p>
            <h1>Kelola berita</h1>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Tambah berita</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsItems as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->title }}</strong>
                            <div class="muted">{{ $item->excerpt }}</div>
                        </td>
                        <td>
                            <span class="badge {{ $item->is_published ? 'badge-green' : 'badge-gray' }}">
                                {{ $item->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ optional($item->published_at)->translatedFormat('d M Y') ?? '-' }}</td>
                        <td class="action-row">
                            <a href="{{ route('news.show', $item) }}" target="_blank" rel="noopener">Lihat</a>
                            <a href="{{ route('admin.news.edit', $item) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger-link">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"><div class="empty-state">Belum ada berita. Klik tombol tambah untuk membuat konten pertama.</div></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap">{{ $newsItems->links() }}</div>
@endsection