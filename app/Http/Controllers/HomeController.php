<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('frontsite.home', [
            'featuredNews' => $this->publishedNews(limit: 3),
            'latestNews' => $this->publishedNews(limit: 6),
        ]);
    }

    public function show(News $news): View
    {
        abort_unless($news->is_published, 404);

        return view('frontsite.show', [
            'news' => $news,
            'latestNews' => $this->publishedNews(ignoreId: $news->getKey(), limit: 4),
        ]);
    }

    private function publishedNews(?int $ignoreId = null, int $limit = 6): Collection
    {
        try {
            return News::query()
                ->published()
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->latest('published_at')
                ->latest('id')
                ->limit($limit)
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }
}