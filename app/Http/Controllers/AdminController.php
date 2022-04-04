<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategories;
use App\Models\TvProgram;
use App\Models\TvSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    function index() {
        return view('admin.pages.index');
    }

    function search(Request $request) {
        $query = $request->get("query");

        $news = News::search($query)->get();
        $tv_programs = TvProgram::search($query);
        $tv_schedules = TvSchedule::search($query);

        $results = collect([
            "news" => $news,
            "tv_programs" => $tv_programs,
            "tv_schedule" => $tv_schedules
        ]);

        return view('admin.pages.search', ["results" => $results]);
    }

    /*
     * News
     */

    function newsList() {
        $news = News::orderBy("published_at", "desc")
            ->paginate(15);

        $news->map(function ($item) {
            $item->video_link = $item->video_link ? true : false;
            $item->is_hot = $item->is_hot ? true : false;
            $item->is_first = $item->is_first ? true : false;
            $item->is_main = $item->is_main ? true : false;
            $item->is_prior = $item->is_main;
            $item->is_primary = $item->is_first;
            $item->editRoute = '/admin/news/' . $item->slug . '/edit';
            $item->deleteRoute = '/admin/news/' . $item->slug;
        });

        return view('admin.pages.news.index', ["news" => $news]);
    }

    function newsCreate () {
        return view('admin.pages.news.create');
    }


    /*
     * News Categories
     */

    function newsCategoriesList() {
        $newsCategories = NewsCategories::orderBy("id")->get();

        $newsCategories->map(function ($item) {
            $item->editRoute = '/admin/news-categories/' . $item->slug . '/edit';
            $item->deleteRoute = '/admin/news-categories/' . $item->slug;
        });

        return view('admin.pages.news_categories.index', ["news_categories" => $newsCategories]);
    }

    function newsCategoryCreate () {
        return view('admin.pages.news_categories.create');
    }


}
