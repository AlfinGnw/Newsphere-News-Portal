<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::with(['author', 'newsCategory'])->where('slug', $slug)->first();
        
        if (!$news) {
            abort(404, 'Berita tidak ditemukan');
        }
        
        $latestNews = News::with(['author', 'newsCategory'])
            ->where('id', '!=', $news->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
            
        return view('pages.news.show', compact('news', 'latestNews'));
    }

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->first();
        
        if (!$category) {
            abort(404, 'Kategori tidak ditemukan');
        }
        
        return view('pages.news.category', compact('category'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $news = collect();
        
        if ($query) {
            $news = News::where('title', 'like', '%' . $query . '%')
                ->orWhere('content', 'like', '%' . $query . '%')
                ->with(['author', 'newsCategory'])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        
        return view('pages.news.search', compact('news', 'query'));
    }
}
