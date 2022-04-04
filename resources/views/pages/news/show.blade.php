<?php
$lastVideo = [
    "video_link" => "https://www.youtube.com/watch?v=oHg5SJYRHA0",
    "imagePath" => "",
    "name" => "Название последнего видео"
]
?>

@extends('layouts.default')

@section("title", "$news->title")

@section('page')
    <div class="container-xl content-bg pb-4">
        <div class="row pt-4">
            <div class="col-12 col-md-8 col-xl-9">
                @include('partials.news_partial', ["news" => $news])

                <a class="d-block mt-4 looks-like-link" href="/">Назад к списку новостей</a>

                <div class="row no-gutters pt-4 ">
                    <div class="col-12">
                        @include("components.h2", ["color" => "blue", "text" => "Новости по теме"])
                    </div>

                    @foreach(\App\Models\News::where("news_category_id", $news->news_category_id ?? 1)->where("published_at", "<=", \Carbon\Carbon::now())->orderBy('id', 'desc')->limit(3)->get() as $news_item)
                        <div class="col-12 col-sm-4 d-flex">
                            @include("partials.news_block", ["news_item" => $news_item, "type" => "small"])
                        </div>
                    @endforeach

                    <div class="mt-4">
                        @include("components.ads", ["position_id" => 2])
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-3 mt-lg-0">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12" style="font-size: 90%;">
                        @include("components.h2", ["color" => "cyan", "text" => "Новости соседей"])

                        @foreach(\App\Models\News::getNeighbours() as $item)
                            @include("partials.news_block", ["news_item"=> $item, "type" => "small", "isNeighbours" => true])
                        @endforeach
                    </div>

                    <div class="col-12 col-sm-6 col-md-12 mt-3">
                        @include("components.ads", ["position_id" => 6])
                    </div>

                    <div class="col-12 col-sm-6 col-md-12 mt-4">
                        @include("components.h2", ["color" => "yellow", "text" => "Промо"])
                        @include("partials.citation_block.citation_block")
                    </div>

{{--                    <div class="col-12 col-sm-6 col-md-12 mt-4">--}}
{{--                        @include("components.h2", ["color" => "red", "text" => "Последнее видео"])--}}
{{--                        @include("partials.last_video_block", ['lastVideo' => $lastVideo])--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
