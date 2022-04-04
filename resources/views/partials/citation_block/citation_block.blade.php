{{-- citation_block основной, пользуйся им, остальные не самостоятельные блоки --}}
<div 
    class="citation-block mb-4" 
    onclick="document.location.href='{{ \App\Models\Promo::orderBy("id", "desc")->first()->link }}'"
    @if (\App\Models\Promo::orderBy("id", "desc")->first()->link != "")
        style="cursor: pointer"
    @endif
    >
        <div class="d-none d-xl-block">
            <img src="/img/promo/{{ \App\Models\Promo::orderBy("id", "desc")->first()->id }}.gif" style="width:100%">
{{--            @include('partials.citation_block.citation_block_xl')--}}
        </div>

        <div class="d-xl-none">
            <img src="/img/promo/{{ \App\Models\Promo::orderBy("id", "desc")->first()->id }}.gif" style="width:100%">
{{--            @include('partials.citation_block.citation_block_md')--}}
        </div>
</div>
