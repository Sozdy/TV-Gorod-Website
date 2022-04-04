<a class="main-news-block d-block" href="/news/{{ $first_news->slug ?? "" }}" style="background-image: url('/img/news/{{ $first_news->id }}.jpg')">
    <div class="overlay">
        <div class="content mx-4 mx-md-5">
            <H3>{{ $first_news->title }}</H3>
            <p>{{ $first_news->short_description ?? mb_substr($first_news->description, 0, 86)."..." }}</p>

            <div class="d-flex justify-content-between">
                <span class="publish-date">{{ \Carbon\Carbon::createFromDate($first_news->published_at)->format("d.m.Y, H:i") }}</span>
                <div class="social-buttons">
                    <!--img class="share" src="/img/icons/social/facebook.svg"-->
                    <img class="share" src="/img/icons/social/vk.svg">
                    <img class="share" src="/img/icons/social/odnoklassniki.svg">
                    <img class="share__more" src="/img/icons/social/more.svg">
                </div>
            </div>
        </div>

        <div class="news-icons mt-md-3 ml-md-5">
            @if($first_news->is_hot)
                <img class="mr-1" src="/img/icons/hot.svg"  title="Горячая новость">
            @endif

            @if($first_news->video_link)
                <img src="/img/icons/has_video.svg" data-youtube-url="{{$first_news->video_link}}" title="Запустить видео">
            @endif
        </div>
    </div>
</a>
