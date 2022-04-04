@extends('layouts.default')

@section("title", "Программы Город 24")

@section('page')
    <div class="programs-page">
        <div class="container-xl content-bg pt-4">
            <div class="row">
                <div class="col-12 col-md-8 col-xl-9">
                    @include("components.h2", ['color'=>'dark-blue', 'text'=>'Рубрики'])

                    <div class="mb-4">
                        @include("partials.rubrics.rubrics", ['tv_programs'=> $tv_programs->filter->active->values(), "isFirstBig" => true])
                    </div>

                    @include("components.h2", ['color'=>'red', 'text'=>'Архивные рубрики'])

                    <div class="mb-4">
                        @include("partials.rubrics.rubrics", ['tv_programs'=> $tv_programs->filter(function ($item) { return !$item->active;})->values(), "isFirstBig" => false])
                    </div>

                    @include("components.h2", ['color'=>'dark-blue', 'text'=>'Главные новости'])

                    <div class="col-12 row no-gutters p-0 mb-4">
                        @foreach(\App\Models\News::where("is_main", true)->orderBy("id", "desc")->limit(3)->get() as $item)
                            <div class="col-12 col-sm-4 d-flex">
                                @include("partials.news_block", [
                                    "news_item" => $item,
                                    "type" => "small"
                                ])
                            </div>
                        @endforeach
                    </div>

                    @include("components.ads", ["position_id" => 2])
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-12 order-sm-1 order-md-1 mb-4">
                            @include('components.h2', ['color' => 'red', 'text' => 'Последние новости'])

                            @foreach(\App\Models\News::orderBy("id", "desc")->limit(3)->get() as $item)
                                @include("partials.news_block", [
                                    "news_item" => $item,
                                    "type" => "small"
                                ])
                            @endforeach
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 order-sm-3 order-md-2">
                            @include("components.ads", ["position_id" => 2])
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 order-sm-2 order-md-3 mb-4">
                            @include("components.h2", ["color" => "green", "text" => "Подписаться"])
                            @include("partials.social_block")
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 order-sm-4 order-md-4">
                            @include("components.ads", ["position_id" => 2])
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
