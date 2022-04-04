<div class="col-12 col-lg-4 col-xl-3">
    <div class="row">

        <div class="col-12 col-sm-6 col-lg-12">
            @include("components.ads", ["position_id" => 7])
        </div>

        <div class="d-block col-12 col-sm-6 col-lg-12 mb-3">
            @include("components.h2", ["color" => "yellow", "text" => "Проголосовать"])
            @include("partials.polling_block", ['number'=>'2'])
        </div>

        <div class="d-block col-12 col-sm-6 col-lg-12 mb-3">
            @include("components.h2", ["color" => "red", "text" => "Интервью"])
            @include("partials.last_video_block", ['lastVideo' => \App\Models\News::getInFrame()[0]])
        </div>
    </div>
</div>
