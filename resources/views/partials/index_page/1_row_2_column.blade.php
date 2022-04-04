<div class="col-12 col-lg-4 col-xl-3">
    <div class="row h-100 align-content-start">
        <div class="col-12 col-sm-6 col-lg-12">
            @include("components.h2", ["color" => "yellow", "text" => "Промо"])
            @include("partials.citation_block.citation_block")
        </div>

        <div class="col-12 col-sm-6 col-lg-12">
            @include("components.h2", ["color" => "green", "text" => "Подписаться"])
            @include("partials.social_block", ['isHome'=>'true'])
        </div>

        <div class="col-12 col-sm-6 col-lg-12">
            @include("components.ads", ["position_id" => 6])
        </div>

        <div class="col-12 col-sm-6 col-lg-12 sticky-top align-self-start pt-2">
            @include("components.h2", ["color" => "dark-blue", "text" => "Новости соседей"])
            <div class="mb-3">
                @foreach(\App\Models\News::getNeighbours(4) as $item)
                    <div class="mb-2 mb-sm-0">
                        @include("partials.news_block", ["news_item" => $item, "type" => "small", "isNeighbours" => true])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
