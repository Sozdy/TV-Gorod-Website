<div class="col-12 col-lg-8 col-xl-9">

    <div class="">
        @include("components.h2", ["color" => "blue", "text" => "Главные новости"])
    </div>

    @include("partials.main_news_block")

    <div class="row no-gutters mt-3">
        <div class="col-12 row no-gutters p-0 mb-3">
            @foreach($main_news as $main_news_item)
                <div class="col-12 col-md-4 d-flex mb-2">
                    @include("partials.news_block", ["news_item" => $main_news_item, "type" => "small", "isNeighbours"=>true])
                </div>
            @endforeach
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            @include("components.ads", ["position_id" => 2])
        </div>
    </div>

    <div class="d-sm-none  d-xl-block">
        @include("components.h2", ["color" => "red", "text" => "Новости"])
    </div>

    <div class="row d-none d-md-block m-0">
        @for($i = 0; $i < 5; $i++)
            <div class="mb-3">
                @include("partials.news_block", ["news_item" => $plain_news[$i], "type" => "horizontal"])
            </div>
        @endfor
    </div>
    <div class="row d-none d-sm-flex d-md-none m-0 mb-3 mr-md-n3 ml-md-n3">
        @for($i = 0; $i < 5; $i++)
            <div class="col-12 col-sm-6 p-0 pr-md-3 pl-md-3 mb-3 d-flex {{ $i % 2 ? 'pl-sm-2 ' : 'pr-sm-2' }}">
                @include("partials.news_block_vertical", ["news_item" => $plain_news[$i]])
            </div>
        @endfor
    </div>
    <div class="d-sm-none mb-3">
        @for($i = 0; $i < 5; $i++)
            <div style="margin-bottom: 8px">
                @include("partials.news_block", ["news_item" => $plain_news[$i], "type" => "small"])
            </div>
        @endfor
    </div>

    @include("components.ads", ["position_id" => 3])

</div>
