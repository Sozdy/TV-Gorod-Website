<a href="{{$link ?? "#"}}" class="rubrics-item  mb-3">
    <div class="d-none d-sm-block rubric-item-picture" style="background: url('/img/programs/{{ $program->id }}.jpg') center no-repeat; background-size: cover;">
        <div class="picture-mask" data-youtube-playlist-url="{{$program->playlist_id}}">
            <div class="play-btn" data-youtube-playlist-url="{{$program->playlist_id}}">

            </div>
        </div>
    </div>
    <div class="text pt-sm-2" data-youtube-playlist-url="{{$program->playlist_id}}">
         <div class="row" data-youtube-playlist-url="{{$program->playlist_id}}">
             <div class="col-10 col-sm-12" data-youtube-playlist-url="{{$program->playlist_id}}">
                {{ $program->name }}
             </div>
             <div class="d-flex d-sm-none justify-content-end col-2" data-youtube-playlist-url="{{$program->playlist_id}}">
                 <img src="/img/icons/has_video.svg" alt="" data-youtube-playlist-url="{{$program->playlist_id}}">
             </div>
         </div>
    </div>
</a>
