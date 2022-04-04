@extends("admin.layout")

@section("page")
    <div class="page-title">Управление новостями</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="news/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'published_at' => 'Дата',
            'title' => 'Заголовок',
            'short_description' => 'Описание',
            'views' => 'Просмотров',
            'is_hot' => '<img src="/img/icons/hot.svg">',
            'video_link' => '<img src="/img/icons/has_video.svg">'],
        "items" => $news
    ])

@endsection
