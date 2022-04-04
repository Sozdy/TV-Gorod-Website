<?php
$citation = [
    "citationText" => "Мэр города Благовещенска Валентина Сергеевна Калита о ситуации с коронавирусом",
    "imagePath" => "/img/tmp_city.jpg",
    "author" => "Костецкий В. Н.",
    "video_link" => "https://www.youtube.com/watch?v=oHg5SJYRHA0"
]
?>

@extends("layouts.default")

@section("title", "Город 24")

@section("page")

    <div class="container-xl content-bg pt-4">
        <div class="row">
            @include('partials.index_page.1_row_1_column')

            @include('partials.index_page.1_row_2_column')
        </div>
        <div class="d-none d-xl-flex row mb-3">
            @for($i = 5; $i < 9; $i++)
                <div class="col-3 d-flex">
                    @include("partials.news_block_vertical", ["news_item" => $plain_news[$i]])
                </div>
            @endfor
        </div>

        <div class="d-xl-none row m-0 mb-0 mr-md-n3 ml-md-n3">
            @for($i = 5; $i < 9; $i++)
                <div class="col-12 col-sm-6 p-0 pr-md-3 pl-md-3 {{ $i%2 ? 'pr-sm-2 ' : 'pl-sm-2' }}">
                    @include("partials.news_block_big", ["news_item" => $plain_news[$i]])
                </div>
            @endfor
        </div>

        <div class="row">
            @include('partials.index_page.2_row_1_column')

            @include('partials.index_page.2_row_2_column')
        </div>
        <div class="row">
            <div class="col-12 col-lg-9">
                @include("components.h2", ["color" => "yellow", "text" => "Партнёры агентства"])
                @include("partials.agency_partners_block")
            </div>
        </div>
    </div>
@endsection
