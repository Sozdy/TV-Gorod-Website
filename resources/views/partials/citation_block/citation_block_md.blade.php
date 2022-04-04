<a href="{{ \App\Models\Promo::orderBy("id", "desc")->first()->link ?? "#"}}">
    <div class="citation-block-small"
         style="background: url('/img/promo/{{ \App\Models\Promo::orderBy("id", "desc")->first()->id }}.gif') center no-repeat; background-size: cover;">
        @if(\App\Models\Promo::orderBy("id", "desc")->first()->text)
        <div class="picture-mask">
            <div class="text">
                <H4>
                    <img class="citation-icon top" src="/img/citation_icon_top_small.svg">
                    {{ \App\Models\Promo::orderBy("id", "desc")->first()->text }}
                    <img class="citation-icon bottom" src="/img/citation_icon_bottom_small.svg">
                </H4>
{{--                <p class="author m-0">what{{ 1 }}</p>--}}
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
        @endif

        @if(\App\Models\Promo::orderBy("id", "desc")->first()->video_id)
            <div class="text-center pt-5">
                <img class="more-video-btn" src="/img/more_video_btn.svg" data-youtube-url="{{ \App\Models\Promo::orderBy("id", "desc")->first()->video_id }}" title="Запустить видео" alt="">
            </div>
        @endif
    </div>
</a>
