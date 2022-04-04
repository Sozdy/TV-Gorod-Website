<?php
    $position_id = 1;

    $ads_by_position = \App\Models\Ad
        ::where("ads_position_id", $position_id)
        ->whereAnd("is_active", true)
        ->orderBy("order", "asc")
        ->get()
?>

@if(count($ads_by_position) > 0)
    <a id="ads_{{ $position_id }}_link" href="{{ $ads_by_position[0]->link }}" class="up-banner">
        <div class="img-container">
            <img id="ads_{{ $position_id }}_image" src="/img/a-ds/{{ $ads_by_position[0]->id }}.jpg" class="w-100 img">
            <div onclick="$('#ads_{{ $position_id }}_link').slideUp(); return false;" class="close-btn">
                X
            </div>
        </div>
    </a>

    @push("scripts")
        <script>
            document.onreadystatechange = function (ready_state) {
                if (document.readyState != "complete")
                    return;

                setInterval(RotateAds, 7000);

                let i = 0;

                let ads = [
                        @foreach($ads_by_position as $ad)
                    {
                        "id": "{{ $ad->id }}",
                        "link": "{{ $ad->link }}",
                    },
                    @endforeach
                ]

                function RotateAds() {
                    i = i >= ads.length-1 ? 0 : i + 1;

                    $("#ads_{{ $position_id }}_image").attr("src", "/img/a-ds/"+ads[i].id+".jpg")
                    $("#ads_{{ $position_id }}_link").attr("href", ads[i].link)
                }
            };
        </script>
    @endpush
@endif
