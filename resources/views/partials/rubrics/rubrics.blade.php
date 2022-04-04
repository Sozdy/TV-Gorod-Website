{{-- rubrics основной, пользуйся им, остальные не самостоятельные блоки --}}
<div class="rubrics">
    <div class="grid mb-1 mb-sm-4">
        @for($i=0; $i < $tv_programs->count(); $i++)
            <div class="rubric-item {{$i == 0 && $isFirstBig ? 'big' : ''}}">
                @include(
                    "partials.rubrics.rubric_item".($i == 0 && $isFirstBig ? "_big" : ""),
                    ["program" => $tv_programs[$i]]
                )
            </div>
        @endfor
    </div>
</div>
