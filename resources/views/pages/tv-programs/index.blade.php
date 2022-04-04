<?php
$lastVideo = [
    "video_link" => "https://www.youtube.com/watch?v=oHg5SJYRHA0",
    "imagePath" => "",
    "name"=>"Название последнего видео"
]
?>

@extends('layouts.default')

@section("title", "Телепрограмма Город 24")

@section("page")
    <div class="tv-programs-page content-bg">
        <div class="container-xl pt-4">
            <div class="row">
                <div class="col-12 col-md-8 col-xl-9">
                    @include("components.h2", ["color" => "red", "text" => "Прямой эфир"])
                    <iframe src="{{ \App\Models\Live::first()->link }}&autoplay=1" style="width: 100%; height: 400px; max-height: 50vh" allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" allowfullscreen></iframe>

                    <br/>
                    <br/>

                    @include("components.h2", ['color'=>'dark-blue', 'text'=>'Телепрограмма'])

                    <div class="mb-4">
                        @include("partials.tv_program_table")
                    </div>

                    <a href="{{ url('/') }}" class="d-none d-md-block link-to-home-page mb-4">Вернуться на главную</a>

                    @include("components.ads", ["position_id" => 2])

                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 mb-4">
                            @include('components.h2', ['color' => 'red', 'text' => 'Новости соседей'])

                            @foreach(\App\Models\News::getNeighbours() as $item)
                                @include("partials.news_block", ["news_item" => $item, "type" => "small"])
                            @endforeach
                        </div>
                        <div class="col-12 col-sm-6 col-md-12">
                            @include("components.ads", ["position_id" => 6])
                        </div>
{{--                        <div class="col-12 col-sm-6 col-md-12 mb-4">--}}
{{--                            @include("components.h2", ['color' => 'orange', 'text' => 'Последнее видео'])--}}
{{--                            @include("partials.last_video_block", ['text' => 'Почти 10 тысяч волонтеров Победы будут работать в Приамурье'])--}}
{{--                        </div>--}}
                        <div class="col-12 col-sm-6 col-md-12">
                            @include("components.ads", ["position_id" => 7])
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
