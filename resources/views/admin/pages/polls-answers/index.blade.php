@extends("admin.layout")

@section("page")
    <div class="page-title">Управление программами</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="tv-programs/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'name' => 'Название',
            'playlist_id' => 'Код плейлиста YouTube',
            'active' => 'Актуальная',
        ],
        "items" => $tv_programs
    ])

@endsection
