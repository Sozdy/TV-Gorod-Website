@extends("admin.layout")

@section("page")
    <div class="page-title">Управление категориями новостей</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="news-categories/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'name' => 'Название'
        ],
        "items" => $news_categories
    ])

@endsection
