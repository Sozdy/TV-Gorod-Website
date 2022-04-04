@extends("admin.layout")

@section("page")
    <div class="page-title">Управление промо</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="promo/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'text' => 'Текст',
            'video_id' => 'Код видео YouTube',
            'link' => 'Ссылка',
        ],
        "items" => $promos
    ])

@endsection
