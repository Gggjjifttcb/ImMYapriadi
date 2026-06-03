@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <div class="page-head">
        <div>
            <p class="section-label">Admin</p>
            <h1>Tambah berita</h1>
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">Kembali</a>
    </div>

    @include('admin.news.form', ['news' => null, 'action' => route('admin.news.store'), 'method' => 'POST'])
@endsection