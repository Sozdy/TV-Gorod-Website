<a href="{{ \App\Models\Promo::orderBy("id", "desc")->first()->link ?? "#"}}">
    <div class="citation-block-xl position-relative" style="background: url('/img/promo/{{ \App\Models\Promo::orderBy("id", "desc")->first()->id }}.gif') center; background-size: cover">
        @if(\App\Models\Promo::orderBy("id", "desc")->first()->text)
        <div class="overlay">
            <div class="content mx-3">
                <img class="citation-icon top" src="/img/citation_icon_top.svg">
                <H4>{{ \App\Models\Promo::orderBy("id", "desc")->first()->text ?? ""}}</H4>
                <img class="citation-icon bottom" src="/img/citation_icon_bottom.svg">
            </div>
        </div>
        @else
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        @endif

        <div class="news-icons position-absolute">
            @if(\App\Models\Promo::orderBy("id", "desc")->first()->video_id)
                <img src="/img/icons/has_video.svg" class="btn-play" data-youtube-url="{{ \App\Models\Promo::orderBy("id", "desc")->first()->video_id }}" title="Запустить видео">
            @endif
        </div>
    </div>
</a>
