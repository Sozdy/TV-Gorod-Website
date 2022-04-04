<div class="divTable">
    <div class="divTableHead">
        <div class="divTableRow">
            @foreach($rows as $row_index => $row_name)
                <div class="divTableCell">{!! $row_name !!}</div>
            @endforeach

            <div class="divTableCell text-nowrap"></div>
        </div>
    </div>
    <div class="divTableBody">
        @foreach($items as $item)
            <div class="divTableRow {{ $item->is_prior ? "prior" : "" }} {{ $item->is_primary ? "primary" : "" }}">
                @foreach($rows as $row_index => $row_name)
                    <div class="divTableCell
                        {{ ($row_index == "created_at" || $row_index == "updated_at" || $row_index == "datetime" || $row_index == "published_at") ? "text-monospace small text-nowrap" : "" }}
                        {{ is_bool($item[$row_index]) ? "text-center" : "" }}"
                    >
                        {!! is_bool($item[$row_index]) ?
                            ($item[$row_index] ? '<span class="glyphicon glyphicon-ok"></span>' : "") :
                            (($row_index == "created_at") ? $item[$row_index]->format("d.m.y H:i") : $item[$row_index])
                        !!}
                    </div>
                @endforeach
                <div class="divTableCell text-nowrap">
                    <a href="{{ $item->editRoute ?? (($item->editRoute ?? $route ?? "") . "/" . $item[$key ?? "no"] . ($item->editRoute ? "" : "/edit")) }}">
                        <span class="glyphicon glyphicon-pencil" style="color: dodgerblue"></span>
                    </a>

                    <form action="{{ $item->deleteRoute ?? (($item->deleteRoute ?? $route ?? "") . "/" . $item[$key ?? "no"]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            onclick="return confirm('Вы действительно хотите удалить данный объект?')"
                            style="background: none; border: none; display: inline; padding: 0; color: red"
                        >
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if($items instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-3">
        {{ $items->links() ?? $items->count()." записей"}}
    </div>
@endif

