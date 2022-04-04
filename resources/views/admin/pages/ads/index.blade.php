@extends("admin.layout")

@section("page")
    <div class="page-title">Управление рекламными блоками</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="ads/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'name' => 'Наименование',
            'link' => 'Ссылка',
        ],
        "items" => $ads
    ])

@endsection
