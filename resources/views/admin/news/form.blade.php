<form method="POST" action="{{ $action }}" class="form-card">
    @csrf
    @if (($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <label>
        <span>Judul</span>
        <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" required>
        @error('title')<small class="form-error">{{ $message }}</small>@enderror
    </label>

    <label>
        <span>Ringkasan</span>
        <textarea name="excerpt" rows="3" required>{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
        @error('excerpt')<small class="form-error">{{ $message }}</small>@enderror
    </label>

    <label>
        <span>Konten</span>
        <textarea name="content" rows="10" required>{{ old('content', $news->content ?? '') }}</textarea>
        @error('content')<small class="form-error">{{ $message }}</small>@enderror
    </label>

    <label class="check-row">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $news->is_published ?? true) ? 'checked' : '' }}>
        <span>Publish berita ini</span>
    </label>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">Batal</a>
    </div>
</form>