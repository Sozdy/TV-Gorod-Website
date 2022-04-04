<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\NewsCategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsReactionController;
use App\Http\Controllers\PollAnswerController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TvProgramController;
use App\Http\Controllers\TvScheduleController;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, "index"])->name('index');

Route::get('/programs', function () {
    return view('pages.programs.index', ["tv_programs" => \App\Models\TvProgram::all()]);
})->name('programs');

Route::get('/tv-programs', function () {
    return view('pages.tv-programs.index');
})->name('tv-programs');

Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');

Route::get('/contacts', function () {
    return view('pages.contacts.index');
})->name('contacts');

Route::resource("/news", NewsController::class, ['only' => [
    'index', 'show'
]])->names([
    'index' => 'news.index',
    'create' => 'news.create',
    'show' => 'news.show'
]);

Route::get('/news/category/{category}', [NewsCategoriesController::class, "getCategory"])
    ->name('category');

Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function () {
    Route::get('/', [AdminController::class, "index"]);

    Route::get('news', [AdminController::class, "newsList"]);
    Route::resource('news', NewsController::class, ['only' => [
        'create', 'store', 'destroy', 'update', 'create', 'edit'
    ]]);

    Route::get('news-categories', [AdminController::class, "newsCategoriesList"]);
    Route::resource('news-categories', NewsCategoriesController::class, ['only' => [
        'create', 'store', 'destroy', 'update', 'create', 'edit'
    ]]);

    Route::get('tv-programs', [TvProgramController::class, "adminIndex"]);
    Route::resource('tv-programs', TvProgramController::class, ['except' => [ 'index' ]]);

    Route::get('tv-schedule', [TvScheduleController::class, "adminIndex"]);
    Route::resource('tv-schedule', TvScheduleController::class, ['except' => [ 'index' ]]);

    Route::get('polls', [PollController::class, "adminIndex"]);
    Route::resource('polls', PollController::class, ['except' => [ 'index' ]]);

    Route::get('polls-answers', [PollAnswerController::class, "adminIndex"]);
    Route::resource('polls-answers', PollAnswerController::class, ['except' => [ 'index' ]]);

    Route::get('live', [LiveController::class, "adminIndex"]);
    Route::resource('live', LiveController::class, ['except' => [ 'index' ]]);

    Route::resource('ads', AdController::class);
    Route::resource('promo', PromoController::class);

    Route::get('employees', [EmployeeController::class, "adminIndex"]);
    Route::resource('employees', EmployeeController::class, ['except' => [ 'index' ]]);

    Route::get('/search', [AdminController::class, "search"]);
});

Route::post("/polls/vote", [PollController::class, "vote"]);
Route::get("/news/{slug}/react/{reaction}", [NewsReactionController::class, "react"]);

Route::get("/search", [SearchController::class, "query"])->name("search");

Route::view("/live", "pages.live.index")->name("live");

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/yarss2.xml', function () {
    return response()->view('rss.news')->header('Content-Type', 'application/xml')->header('charset', "utf-8");
});
Route::get('/social.rss', function () {
    return response()->view('rss.social_webs')->header('Content-Type', 'application/xml')->header('charset', "utf-8");
});
Route::get('/tg.rss', function () {
    return response()->view('rss.telegram')->header('Content-Type', 'application/xml')->header('charset', "utf-8");
});
