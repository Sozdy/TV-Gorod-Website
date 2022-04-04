<?php
$lastVideo = [
    "video_link" => "https://www.youtube.com/watch?v=oHg5SJYRHA0",
    "imagePath" => "",
    "name"=>"Название последнего видео"
];
?>

@extends('layouts.default')

@section("title", "О компании Город 24")

@section("page")
    <div class="about-page">
    <div class="container-xl content-bg pt-4 pb-4">
        <div class="row">
            <div class="col-12 col-md-8 col-xl-9 mb-4 mb-md-0">
                @include('components.h2', ['color' => 'orange', 'text' => 'Об агентстве'])
                @include('components.main_about_picture')
                @include('components.main_about_info_block')

                @include('components.h2', ['color' => 'dark-blue', 'text' => 'Редакция службы новостей'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 1)->get(), 'carouselId' => 'editorial-department'])

                @include('components.h2', ['color' => 'yellow', 'text' => 'Редакция телеканала'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 4)->get(), 'carouselId' => 'editorial-department'])

                @include('components.h2', ['color' => 'green', 'text' => 'Рекламная служба'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 2)->get(), 'carouselId' => 'advertising-department'])

                @include('components.h2', ['color' => 'red', 'text' => 'Хозяйственный отдел'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 5)->get(), 'carouselId' => 'advertising-department'])

                @include('components.h2', ['color' => 'orange', 'text' => 'Административный отдел'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 6)->get(), 'carouselId' => 'advertising-department'])

                @include('components.h2', ['color' => 'cyan', 'text' => 'Руководство'])
                @include("partials.staff_list_carousel", ["staff" => \App\Models\Employee::where("category", 3)->get(), 'carouselId' => 'management-department'])
            </div>

            <div class="col-12 col-md-4 col-xl-3 mt-lg-0">
                <div class="row pl-md-3 pr-md-3">
                    <div class="col-12 col-sm-6 col-md-12 pr-md-0 pl-md-0 mb-4">
                        @include('components.h2', ['color' => 'red', 'text' => 'Последние новости'])

                        @foreach(\App\Models\News::orderBy("id", "desc")->limit(3)->get() as $news_item)
                            @include("partials.news_block", ["news_item" => $news_item, "type" => "small"])
                        @endforeach

                    </div>
                    <div class="col-12 col-sm-6 col-md-12 pr-sm-3 pl-sm-3 p-md-0 mb-4">

                        @include("components.h2", ["color" => "yellow", "text" => "Цитата недели"])
                        @include("partials.citation_block.citation_block")

                    </div>
                    <div class="col-12 col-sm-6 col-md-12 pr-sm-3 pl-sm-3 p-md-0 mb-4">

                        @include("components.h2", ["color" => "green", "text" => "Подписаться"])
                        @include("partials.social_block")

                    </div>
{{--                    <div class="col-12 col-sm-6 col-md-12 pr-sm-3 pl-sm-3 p-md-0">--}}
{{--                        @include("components.h2", ['color' => 'orange', 'text' => 'Последнее видео'])--}}
{{--                        @include("partials.last_video_block", ["lastVideo" => $lastVideo])--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

        <a href="{{ url('/') }}" class="d-none d-md-block link-to-home-page">Вернуться на главную</a>
    </div>
    </div>
@endsection
