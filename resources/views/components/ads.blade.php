<?php
    $ads_by_position = \App\Models\Ad
        ::where("ads_position_id", $position_id)
        ->whereAnd("is_active", true)
        ->orderBy("order", "asc")
        ->get()
?>

@if(count($ads_by_position) > 0)
    <div class="ad mb-3">
        <a id="ads_{{ $position_id }}_link" href="{{ $ads_by_position[0]->link }}">
            <img id="ads_{{ $position_id }}_image" src="/img/a-ds/{{ $ads_by_position[0]->id }}.jpg" style="width: 100%">
        </a>
    </div>

    @push("scripts")
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                setInterval(RotateAds, 5000);

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
            });
        </script>
    @endpush
@endif
