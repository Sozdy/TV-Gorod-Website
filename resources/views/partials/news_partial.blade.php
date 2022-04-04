<div class="news-partial p-4">
    <div class="social-icons-container">
        <a href="#" class="social-icon-item youtube">
            <img src="/img/icons/social/youtube_big.svg" alt="youtube">
        </a>

        <a href="#" class="social-icon-item telegram">
            <img src="/img/icons/social/telegram_big.svg" alt=telegram">
        </a>

        <!--a href="#" class="social-icon-item instagram">
            <img src="/img/icons/social/instagram_big.svg" alt="instagram">
        </a-->

        <a href="#" class="social-icon-item ok">
            <img src="/img/icons/social/ok_big.svg" alt="ok">
        </a>


    </div>
    <H1 class="mt-2">{{ $news->title }}</H1>

    <hr class="mb-2 mt-0">

    <div class="row position-relative mr-n3 mr-sm-0 mr-md-n3 mr-xl-0 ">
        {{--        <img class="col-8" src="/img/news/{{ $news->id }}.jpg" style="object-fit: cover;">--}}
        <img class="col-12 col-sm-8 col-md-12 col-xl-8" src="/img/news/{{ $news->id }}.jpg" style="object-fit: cover;">

        <div class="d-flex d-md-none d-xl-flex col col-sm-4 authors-block-xs-and-xl">
            <div class="authors">
                <div class="mb-3">
                    <strong>
                        <p class="category mb-2">
                            Категория:
                            <br class="d-none d-sm-block">
                            <a href="/news/category/{{ (!$news->news_category_id || $news->news_category_id == 1) ? "all" : App\Models\NewsCategories::whereId($news->news_category_id ?? 1)->first()->slug }}">
                                {{ App\Models\NewsCategories::whereId($news->news_category_id ?? 1)->first()->name }}
                            </a>
                        </p></strong>
                    @if($news->text_author)
                    <p class="article-author mb-2">Автор материала: <br class="d-none d-sm-block">{{ $news->text_author }}</p>
                    @endif
                    @if($news->photo_author)
                    <p class="photo-author mb-2">Фото: <br class="d-none d-sm-block">{{ $news->photo_author }}</p>
                    @endif
                </div>
                <p class="publish-date m-0">
                    Дата публикации: <br class="d-none d-sm-block"> {{ \Carbon\Carbon::createFromDate($news->published_at)->format('d.m.Y, H:i')}}
                </p>
                <p class="publish-date m-0 d-none">
                    Просмотров: {{$news->views}}
                </p>
            </div>
            <div>
                @if($news->video_link)
                    <div id="video-btn-container" class="mt-2">
                        <div class="video-button" data-youtube-url="{{$news->video_link}}" title="Запустить видео">
                            <span data-youtube-url="{{$news->video_link}}">Смотреть видео</span>
                            <img src="/img/icons/play_small.svg" style="height: 1em" class=""
                                 data-youtube-url="{{$news->video_link}}" title="Запустить видео">
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="d-none d-md-flex d-xl-none col-xl-12 authors-block-sm-and-lg mt-2">
            <div>
                <div class="authors">
                    <strong>
                        <p class="category mb-2">Категория:
                            <a href="/news/category/{{ (!$news->news_category_id || $news->news_category_id == 1) ? "all" : App\Models\NewsCategories::whereId($news->news_category_id ?? 1)->first()->slug }}">
                                {{ App\Models\NewsCategories::whereId($news->news_category_id ?? 1)->first()->name }}
                            </a>
                        </p>
                    </strong>
                    @if($news->text_author)
                    <p class="article-author mb-2">Автор статьи: {{ $news->text_author }}</p>
                    @endif
                    @if($news->photo_author)
                    <p class="photo-author mb-2">Фото: {{ $news->photo_author }}</p>
                    @endif
                    <p class="publish-date m-0">
                        Дата публикации: {{\Carbon\Carbon::createFromDate($news->published_at)->format('d.m.Y, H:i')}}
                    </p>

                    <div>
                        @if($news->video_link)
                            <div id="video-btn-container">
                                <div class="video-button" data-youtube-url="{{$news->video_link}}" title="Запустить видео">
                                    <img src="/img/icons/play_small.svg" style="height: 1em" class=""
                                         data-youtube-url="{{$news->video_link}}" title="Запустить видео">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="description mb-3 mt-3">
        <H2 class="my-2" style="font-size: 1em">{{ $news->short_description }}</H2>

        <hr class="mb-2 mt-1">

        {!! $news->description !!}
    </div>

    <?php
        function getReactionsCount($news_id, $reaction_id) {
            $news_reaction = \App\Models\NewsReaction::where("news_id", $news_id)->where("reaction_id", $reaction_id)->first();
            return $news_reaction ? $news_reaction->count : 0;
        }
    ?>

    <div class="date-and-reactions-container">
        <div class="publish-date">
        </div>
        <div id="reactions" class="reactions">
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/like.svg" data-reaction-name="like" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 1) }}</p>
            </div>
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/happy.svg" data-reaction-name="happy" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 2) }}</p>
            </div>
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/surprised.svg" data-reaction-name="surprised" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 3) }}</p>
            </div>
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/sad.svg" data-reaction-name="sad" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 4) }}</p>
            </div>
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/angry.svg" data-reaction-name="angry" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 5) }}</p>
            </div>
            <div class="img-container ml-1 ml-sm-2">
                <img class="" src="/img/icons/reactions/dislike.svg" data-reaction-name="dislike" data-news-slug="{{$news->slug}}">
                <p class="clicks-number">{{ getReactionsCount($news->id, 6) }}</p>
            </div>
        </div>
    </div>
</div>
