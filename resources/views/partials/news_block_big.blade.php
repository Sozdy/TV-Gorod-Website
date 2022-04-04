<div href="/news/{{ $news_item->slug ?? "news_slug" }}"
   class="news-block-big w-100 big">

    <div class="image-container" style="background-image: url('/img/news/{{ $news_item->id ?? 0 }}.jpg');">
        <span class="news-icons">
            @if($news_item->is_hot ?? '')
                <img class="ml-1" src="/img/icons/hot.svg" title="Горячая новость">
            @endif
            @if($news_item->video_link ?? '')
                <img src="/img/icons/has_video.svg" data-youtube-url="{{ $news_item->video_link }}" title="Запустить видео">
            @endif
        </span>
    </div>

    <div class="content w-100 d-flex flex-column p-4">
        <a href="/news/{{ $news_item->slug ?? "news_slug" }}">
            <H4 class="title">
                {{ $news_item->title ?? "Заголовок новости" }}
            </H4>
        </a>

        <p class="d-none d-md-block flex-grow-1 description">{{ $news_item->short_description ?? mb_substr($news_item->description ?? "Краткое описание новости", 0, 86)."..." }}</p>

        <div class="d-flex justify-content-between">
            <span class="publish-date">{{ (\Carbon\Carbon::createFromDate($news_item->published_at) ?? \Carbon\Carbon::now())->format("d.m.Y, H:i") ?? "" }}</span>
            <div class="social-buttons">
                <!--a href="https://www.facebook.com/sharer/sharer.php?u=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&t={{ $news_item->title }}&i=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в Facebook"><img class="share d-none d-sm-inline-block" src="/img/icons/social/facebook.svg"></a!-->
                <a href="https://vk.com/share.php?url=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&title={{ $news_item->title }}&image=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в ВК"><img class="share d-none d-sm-inline-block" src="/img/icons/social/vk.svg"></a>
                <a href="https://connect.ok.ru/offer?url=https://твгород.рф/news/{{ $news_item->slug ?? "news_slug" }}&title={{ $news_item->title }}&description={{ $news_item->short_description }}&imageUrl=https://твгород.рф/img/news/{{ $news_item->id ?? 0 }}.jpg" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;" target="_blank" title="Поделиться в Одноклассниках"><img class="share d-none d-sm-inline-block" src="/img/icons/social/odnoklassniki.svg"></a>
                <img class="share share__more" src="/img/icons/social/more.svg">
            </div>
        </div>
    </div>
</div>
