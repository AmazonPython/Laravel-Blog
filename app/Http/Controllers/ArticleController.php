<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        return view('article')->withArticle(Article::with('hasManyComments')->find($id));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $articles = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->paginate(2);

        $counts = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->count();

        return view('search', compact('articles', 'counts'));
    }
}
