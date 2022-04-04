<div
{{--    onclick="document.location.href = '/news/{{ $news_item->slug ?? "news_slug" }}'"--}}
    class="news-block w-100
    {{$type == 'vertical' ? 'd-flex flex-column' : ''}}
       {{$type == 'vertical' || $type == 'small' ? 'flex-grow-1 d-md-flex flex-md-column' : '' }}
       {{$type == 'small' ? '' : '' }} {{ $type ?? "" }} {{ ($isNewsPage ?? false) ? 'news-page' : ''}}">

    @if($type != "small")
        <div class="image-container" style="background-image: url('/img/news/{{ $news_item->id ?? 0 }}.jpg');">
            @if ($type == "horizontal")
                <img class="mask " src="/img/news_horizontal_img_mask.svg">
            @elseif ($type == "vertical")
                <img class="mask" src="/img/news_vertical_img_mask.svg">
            @endif

            @if ($type != "small")
                <span class="news-icons absolute">
                    @if($news_item->is_hot ?? '')
                        <img class="ml-1" src="/img/icons/hot.svg" title="Горячая новость">
                    @endif
                    @if($news_item->video_link ?? '')
                        <img src="/img/icons/has_video.svg" data-youtube-url="{{ $news_item->video_link }}" title="Запустить видео">
                    @endif
                </span>
            @endif
        </div>

        @if ($type == "horizontal")
            <img class="news-block-decoration" src="/img/news_block_decoration.svg">
        @endif
    @endif

    <div class="content w-100 d-flex flex-column
        @if ($type == "horizontal") p-4 pt-sm-4 pb-sm-4 pr-sm-5 pl-sm-1
        @elseif ($type == "vertical") px-4 pb-4 py-4 pt-sm-0 flex-grow-1
        @elseif (($type == "small")) p-4 flex-grow-1
        @endif
        ">

        <a href="/news/{{ $news_item->slug ?? "news_slug" }} " class="{{$type == 'small' ? "flex-grow-1" : "" }}">
            <H4 class="{{ $type == 'vertical' || $type == 'small' ? "flex-grow-1" : "" }}">
                {{ $news_item->title ?? "Заголовок новости" }}

                @if ($type == "small")
                    <span class="d-none d-sm-inline-block news-icons">

                        @if($news_item->is_hot ?? '')
                            <img class="ml-1" src="/img/icons/hot.svg" title="Горячая новость">
                        @endif
                        @if($news_item->video_link ?? '')
                            <img src="/img/icons/has_video.svg" data-youtube-url="{{ $news_item->video_link }}" title="Запустить видео">
                        @endif
                    </span>
                @endif
            </H4>
        </a>

        @if(! ($isNeighbours ?? false))
            <p class="{{$type == 'vertical' ? "" : "flex-grow-1"}} d-none d-sm-block">{{ strip_tags($news_item->short_description ?? mb_substr($news_item->description ?? "Краткое описание новости", 0, 86)."...") }}</p>
        @endif

        <div class="d-flex justify-content-between">
            <span class="publish-date">{{ (\Carbon\Carbon::createFromDate($news_item->published_at) ?? \Carbon\Carbon::now())->format("d.m.Y, H:i") ?? "" }}</span>
            <div class="{{$type == 'small' ? 'd-none d-sm-block' : ''}} social-buttons">
                <!--a href="https://www.facebook.com/sharer/sharer.php?u=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&t={{ $news_item->title }}&i=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в Facebook"><img class="share" src="/img/icons/social/facebook.svg"></a-->
                <a href="https://vk.com/share.php?url=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&title={{ $news_item->title }}&image=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в ВК"><img class="share" src="/img/icons/social/vk.svg"></a>
                <a href="https://connect.ok.ru/offer?url=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&title={{ $news_item->title }}&description={{ strip_tags($news_item->short_description) }}&imageUrl=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в Одноклассниках"><img class="share" src="/img/icons/social/odnoklassniki.svg"></a>
                <img class="share share__more" src="/img/icons/social/more.svg">
            </div>
        </div>
    </div>
    @if ($type == "small")
        <div class="d-sm-none social-buttons-sm d-flex flex-column justify-content-between">

                <div class="news-icons">
                    @if($news_item->is_hot ?? '')
                        <img class="" src="/img/icons/hot.svg" title="Горячая новость">
                    @endif
                    @if($news_item->video_link ?? '')
                        <img src="/img/icons/has_video.svg" data-youtube-url="{{ $news_item->video_link }}" title="Запустить видео">
                    @endif
                </div>
                <div class="social-buttons">
                    <img class="share share__more" src="/img/icons/social/more.svg">
                </div>

        </div>
    @endif

</div>
