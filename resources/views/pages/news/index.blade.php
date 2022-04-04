<?php
    $lastVideo = [
        "video_link" => "https://www.youtube.com/watch?v=oHg5SJYRHA0",
        "imagePath" => "",
        "name" => "Название последнего видео"
    ];
?>

@extends('layouts.default')

@section("title", "Новости Город 24")

@section('page')
    <div class="container-xl content-bg pt-4 pb-4">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-9">

                @if ( Route::currentRouteName() == 'all-news')
                    @include('components.h2', ['color' => 'grey', 'text' => 'Все новости'])
                @elseif(Route::currentRouteName() == 'attention-news')
                    @include('components.h2', ['color' => 'blue', 'text' => 'Горячие новости'])
                @elseif(Route::currentRouteName() == 'search') <!--TODO: Настроить!-->
                    @include('components.h2', ['color' => 'cyan', 'text' => 'Поиск'])
                @elseif(Route::currentRouteName() == 'Какой-то-еще-там-роут') <!--TODO: Настроить!-->
                    @include('components.h2', ['color' => 'cyan', 'text' => 'Новости соседей'])
                @endif

                @if(Route::currentRouteName() != 'search')
                    <div class="d-lg-none">
                        @include('components.date_picker')
                    </div>
                @endif

                @if($news->count() == 0)
                    К сожалению, новостей по вашему запросу нет.
                    @if(Route::currentRouteName() != 'search')
                        <br />
                        Пожалуйста, выберите другую дату в календаре.
                    @endif
                @endif

                <div class="d-none d-xl-flex row mb-3 mr-md-n3 ml-md-n3">
                    @foreach($news as $news_item)
                        <div class="col-12 col-xl-4 p-0 mb-3 pr-md-3 pl-md-3 d-flex {{ $loop->index % 2 ? 'pl-sm-2 ' : 'pr-sm-2' }}">
                            @include("partials.news_block_vertical", ["news_item" => $news_item])
                        </div>
                        @if($loop->index == 5)
                            <div class="col-12">
                                @include("components.ads", ["position_id" => 2])
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="d-xl-none row m-0 mb-0 mr-md-n3 ml-md-n3">
                    @foreach($news as $news_item)
                        <div class="col-12 col-sm-6 p-0 pr-md-3 pl-md-3 {{ $loop->index%2 ? 'pl-sm-2 ' : 'pr-sm-2' }}">
                            @include("partials.news_block_big", ["news_item" => $news_item])
                        </div>
                        @if($loop->index == 5)
                            <div class="col-12 p-0">
                                @include("components.ads", ["position_id" => 3])
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="row">
                    @if(Route::currentRouteName() != 'search')
                        @include("components.days_switcher")
                    @elseif($news instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $news->appends(request()->input())->links() ?? $news->count()." записей"}}
                    @endif
                </div>

                @include("components.ads", ["position_id" => 4])
            </div>

            <div class="col-12 col-lg-4 col-xl-3">

                @if(Route::currentRouteName() != 'search')
                    <div class="d-none d-lg-block">
                        @include('components.h2', ['color' => 'orange', 'text' => 'Календарь'])
                        <Calendar/>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-12">
                        @include("components.ads", ["position_id" => 6])
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12 mb-4">
                        @include("components.h2", ["color" => "green", "text" => "Подписаться"])
                        @include("partials.social_block", ['isHome'=>'true'])
                    </div>
{{--                    <div class="col-12 col-sm-6 col-lg-12">--}}
{{--                        @include("components.h2", ['color' => 'orange', 'text' => 'Последнее видео'])--}}
{{--                        @include("partials.last_video_block", ["lastVideo" => $lastVideo])--}}
{{--                    </div>--}}
                    <div class="col-12 col-sm-6 col-lg-12">
                        @include("components.ads", ["position_id" => 7])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
