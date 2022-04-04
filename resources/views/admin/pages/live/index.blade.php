@extends("admin.layout")

@section("page")
    <div class="page-title">Управление прямым эфиром</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
{{--        <a href="live/create" class="btn btn-success">Добавить</a>--}}
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'link' => 'Ссылка',
        ],
        "items" => $lives
    ])

@endsection
