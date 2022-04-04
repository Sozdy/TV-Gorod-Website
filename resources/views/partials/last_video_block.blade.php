<div class="last-video-block mb-3">
    <div class="last-video-picture mb-2" style="background: url('/img/news/{{ $lastVideo->id }}.jpg') center no-repeat; background-size: cover;" data-youtube-url="{{ $lastVideo->video_link ?? null }}">
        <div class="picture-mask" data-youtube-url="{{ $lastVideo->video_link ?? null }}">
            <div class="play-btn" data-youtube-url="{{ $lastVideo->video_link ?? null }}" title="Запустить видео"></div>
        </div>
    </div>
    <span class="text">
         {{ $lastVideo->title }}
    </span>
</div>
