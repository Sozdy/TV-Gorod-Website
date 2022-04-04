<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsReaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plain_news = News::where("is_main", false)
            ->where("news_category_id", "!=", "2")
            ->where("published_at", "<=", Carbon::now())
            ->orderBy("published_at", "desc")
            ->paginate(15);

        $main_news  = News::where("is_main", true) ->where("is_first", false)->get();
        $first_news = News::where("is_first", true)->first();

        return view('pages.index', [
            "first_news" => $first_news,
            "main_news" => $main_news,
            "plain_news" => $plain_news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.news.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:news|max:255',
            'short_description' => 'required|max:255',
            'description' => 'required|max:10000',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $request->merge([
            'is_hot'                => isset($request->is_hot),
            'is_main'               => isset($request->is_main) || isset($request->is_first),
            'is_first'              => isset($request->is_first),
            'export_news'           => isset($request->export_news),
            'export_social_webs'    => isset($request->export_social_webs),
            'export_telegram'       => isset($request->export_telegram),
            'published_at'          => $request->published_at ?? Carbon::now()
        ]);

        if (! $request->file('image'))
            abort(500, 'Could not upload image :(');

        // Удаляем предыдущую первую новость
        if ($request->is_first)
            foreach(News::where("is_first", true)->get() as $item)
                $item->update(["is_first" => false, "is_main" => false]);

        // Удаляем предыдущую главную новость (если их уже 3)
        if (
            $request->is_main &&
            !$request->is_first &&
            News::where("is_main", true)->where("is_first", false)->count() >= 3
        )
            News::where("is_main", true)
                ->where("is_first", false)
                ->orderBy("published_at", "asc")
                ->first()
                ->update(["is_main" => false]);

        $new = News::create($request->all());

        $image = $request->file('image');
        $input['imagename'] = $new->id.'.jpg';

        $destinationPath = public_path('/img/news');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 640, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $request->flash();

        return redirect("/admin/news")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news->update(['views' => $news->views + 1]);

        function parseFormatting($value) {
            $findAndReplace = [
                '<blockquote>' => '</div><div class="quote mr-n4 ml-n4"><img src="/img/news_quote.svg" alt="">',
                '</blockquote>' => '</div><div class="description mb-3">',
            ];

            return str_replace(array_keys($findAndReplace), array_values($findAndReplace), $value);
        }

        $news->description = parseFormatting($news->description);

        return view("pages.news.show", ["news" => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view("admin.pages.news.create", ["old" => $news]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'short_description' => 'required|max:255',
            'description' => 'required|max:10000',
        ]);

        $request->merge([
            'is_hot'                => isset($request->is_hot),
            'is_main'               => isset($request->is_main) || isset($request->is_first),
            'is_first'              => isset($request->is_first),
            'export_news'           => isset($request->export_news),
            'export_social_webs'    => isset($request->export_social_webs),
            'export_telegram'       => isset($request->export_telegram),
            'published_at'          => $request->published_at ?? Carbon::now()
        ]);

        if ($news->is_first && !$request->is_first)
            return response("Прежде чем убрать Первую Новость - пожалуйста, укажите другую Первую Новость. Эта Новость автоматически перестанет быть Первой.", 422);

            // Удаляем предыдущую первую новость
        if ($request->is_first)
            foreach(News::where("is_first", true)->get() as $item)
                $item->update(["is_first" => false, "is_main" => false]);

        // Удаляем предыдущую главную новость (если их уже 3)
        if (
            $request->is_main &&
            !$request->is_first &&
            News::where("is_main", true)->where("is_first", false)->count() >= 3
        )
            News::where("is_main", true)
                ->where("is_first", false)
                ->orderBy("published_at", "asc")
                ->first()
                ->update(["is_main" => false]);

        $news->update($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = $news->id . '.jpg';

            $destinationPath = public_path('/img/news');
            $img = Image::make($image->getRealPath());
            $img->resize(800, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
        }

        return redirect()->to("/admin/news")->with("success", "Операция успешно выполнена!");
    }

    public function destroy(News $news)
    {
        NewsReaction::where("news_id", $news->id)->delete();
        $news->delete();

        return redirect()->back()->with("success", "Операция успешно выполнена!")->withInput();
    }
}
