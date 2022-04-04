@extends('layouts.default')

@section("title", "Прямой эфир Город 24")

@section("page")


    <div class="container-xl content-bg contacts-page pt-4 pb-4">
        <div class="row mb-4">
            <div class="col-12">
                @include("components.h2", ["color" => "red", "text" => "Прямой эфир"])
                <iframe src="https://vk.com/video_ext.php?oid=304034252&id=456239291&hash=931e26c76d50772c&hd=1&autoplay=1" style="width: 100%; height: 660px;" allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
