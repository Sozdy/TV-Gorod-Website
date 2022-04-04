<div class="col-12 col-lg-8 col-xl-9">

    {{-- @include('components.gif_ads') --}}

    <div class="news-blocks-list">

        <div class="d-none d-md-block">
            @for($i = 9; $i < 14; $i++)
                <div class="mb-3">
                    @include("partials.news_block", ["news_item" => $plain_news[$i], "type" => "horizontal"])
                </div>
            @endfor
        </div>

        <div class="row d-none d-sm-flex d-md-none m-0 mb-0 mr-md-n3 ml-md-n3">
            @for($i = 9; $i < 14; $i++)
                <div class="col-12 col-sm-6 p-0 pr-md-3 pl-md-3 d-flex {{ $i%2 ? 'pl-sm-2 ' : 'pr-sm-2' }}">
                    @include("partials.news_block_vertical", ["news_item" => $plain_news[$i]])
                </div>
            @endfor
        </div>

        @include("components.ads", ["position_id" => 4])

        <div class="row d-sm-none">
            @for($i = 9; $i < 14; $i++)
                <div class="col-12 mb-2">
                    @include("partials.news_block", ["news_item" => $plain_news[$i], "type" => "small"])
                </div>
            @endfor
        </div>

        <div class="row mt-2">
            <div class="col-auto">
                <a class="link-to-news-page" href="{{ url('/news/category/all') }}">
                    <div class="btn-blue">Все новости</div>
                </a>
            </div>
        </div>
    </div>

    <div class="">
        @include("components.ads", ["position_id" => 5])
    </div>
</div>
