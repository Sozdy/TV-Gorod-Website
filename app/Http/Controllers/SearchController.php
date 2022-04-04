<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function query(Request $request)
    {
        $found_news = News::search($request->get("query"))
            ->orderBy("published_at", "desc")
            ->take(1000)
            ->paginate(24);

        return view("pages.news.index", ["news" => $found_news]);
    }
}
