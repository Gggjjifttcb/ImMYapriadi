@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="page-head">
        <div>
            <p class="section-label">Admin</p>
            <h1>Edit berita</h1>
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">Kembali</a>
    </div>

    @include('admin.news.form', ['news' => $news, 'action' => route('admin.news.update', $news), 'method' => 'PUT'])
@endsection