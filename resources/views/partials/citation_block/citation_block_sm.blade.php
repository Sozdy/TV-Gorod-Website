<a href="{{$link ?? "#"}}" class="last-video-block  mb-3">
    <div class="last-video-picture mb-2"
         style="background: url('{{ $citation["imagePath"] ?? "/img/last_video_placeholder.jpg" }}') center no-repeat; background-size: cover;">
        <div class="picture-mask">
            @if($citation["video_link"])
                <div class="play-btn" data-youtube-url="{{ $citation["video_link"] }}" title="Запустить видео">
                </div>
            @endif

        </div>
    </div>
    @isset($citation["citationText"])
        <span class="text">
             {{ $citation["citationText"]  }}
        </span>
    @endisset
</a>
