<a href="{{$link ?? "#"}}" class="rubric-item-big  mb-3">
    <div class="rubric-item-picture" style="background: url('/img/programs/{{ $program->id }}.jpg') center no-repeat; background-size: cover;">
        <div class="picture-mask" data-youtube-playlist-url="{{$program->playlist_id}}">
            <div class="play-btn" data-youtube-playlist-url="{{$program->playlist_id}}"></div>
        </div>
    </div>

    <div class="text" data-youtube-playlist-url="{{$program->playlist_id}}">
         {{ $program->name }}
    </div>
</a>
