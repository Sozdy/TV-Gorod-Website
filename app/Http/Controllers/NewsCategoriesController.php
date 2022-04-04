<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function list()
    {
        return NewsCategories::pluck("name", "id");
    }

    function getCategory (Request $request, $category) {
        $date = $request->query("date") ?? \Carbon\Carbon::now()->format("Y-m-d");
        $news = null;

        if ($category == "all")
            $news = News::where("published_at", "<=", Carbon::now())
                ->whereBetween('published_at', [$date." 00:00:00", $date." 23:59:59"])
                ->orderBy("created_at", "desc")
                ->get();
        else
            $news = News::where("published_at", "<=", Carbon::now())
                ->whereBetween('published_at', [$date." 00:00:00", $date." 23:59:59"])
                ->where("news_category_id", NewsCategories::where("slug", $category)->first()->id)
                ->orderBy("published_at", "desc")
                ->get();

        return view('pages.news.index', ["news" => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.news_categories.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:news_categories|max:255',
            'slug' => 'required|unique:news_categories|max:255',
        ]);

        NewsCategories::create($request->all());

        $request->flash();

        return redirect("/admin/news-categories")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
//        return view("pages.news.show", ["news" => $news]);
    }

    public function edit(NewsCategories $newsCategory)
    {
        return view("admin.pages.news_categories.create", ["old" => $newsCategory]);
    }

    public function update(Request $request, NewsCategories $newsCategory)
    {
        $newsCategory->update($request->all());

        return redirect()->to("/admin/news-categories")->with("success", "Операция успешно выполнена!");
    }

    public function destroy(NewsCategories $newsCategory)
    {
        try {
            $newsCategory->delete();
        } catch (\Exception $e) {
            return response("Ошибка при удалении! Вероятно, данная категория уже назначена каким-либо новостям. Сначала удалите или смените категорию этих новостей.", 403);
        }

        return redirect()->to("/admin/news-categories")->with("success", "Операция успешно выполнена!");
    }
}
