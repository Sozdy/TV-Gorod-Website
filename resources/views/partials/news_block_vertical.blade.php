<a href="/news/{{ $news_item->slug ?? "news_slug" }}"
   class="vertical news-block w-100 d-flex flex-column flex-grow-1 mb-3">

    <div class="image-container" style="background-image: url('/img/news/{{ $news_item->id ?? 0 }}.jpg');">
        <img class="mask" src="/img/news_vertical_img_mask.svg">

        <span class="news-icons absolute">
            @if($news_item->is_hot ?? '')
                <img class="ml-1" src="/img/icons/hot.svg" title="Горячая новость">
            @endif
            @if($news_item->video_link ?? '')
                <img src="/img/icons/has_video.svg" data-youtube-url="{{ $news_item->video_link }}"
                     title="Запустить видео">
            @endif
        </span>
    </div>

    <div class="content w-100 d-flex flex-column px-4 pb-4 py-4 pt-sm-0 flex-grow-1">
        <H4 class="">
            {{ $news_item->title ?? "Заголовок новости" }}
        </H4>
        <p class="flex-grow-1 d-none d-sm-block">{{ strip_tags($news_item->short_description ?? mb_substr($news_item->description ?? "Краткое описание новости", 0, 86) . "...") }}</p>

        <div class="d-flex justify-content-between">
            <span
                class="publish-date">{{ (\Carbon\Carbon::createFromDate($news_item->published_at) ?? \Carbon\Carbon::now())->format("d.m.Y, H:i") ?? "" }}
            </span>
            <div class="social-buttons">
                <!--img class="share" src="/img/icons/social/facebook.svg"-->
                <img class="share" src="/img/icons/social/vk.svg">
                <img class="share" src="/img/icons/social/odnoklassniki.svg">
                <img class="share share__more" src="/img/icons/social/more.svg">
            </div>
        </div>
    </div>
</a>
