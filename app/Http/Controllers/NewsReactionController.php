<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsReaction;
use App\Models\Reaction;
use Illuminate\Http\Request;

class NewsReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function react($slug, $reaction)
    {
        $news_id = News::where('slug', $slug)->first()->id;
        $reaction_id = Reaction::where('code', $reaction)->first()->id;
        $news_reaction = NewsReaction::where("news_id", $news_id)->where("reaction_id", $reaction_id)->first();

        if ($news_reaction != null) {
            $news_reaction->increment("count");
        } else
            NewsReaction::create([
                "news_id" => $news_id,
                "reaction_id" => $reaction_id,
                "count" => 1
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsReaction  $newsReaction
     * @return \Illuminate\Http\Response
     */
    public function show(NewsReaction $newsReaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsReaction  $newsReaction
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsReaction $newsReaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsReaction  $newsReaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsReaction $newsReaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsReaction  $newsReaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsReaction $newsReaction)
    {
        //
    }
}
