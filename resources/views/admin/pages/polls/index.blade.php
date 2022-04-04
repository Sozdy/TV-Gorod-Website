@extends("admin.layout")

@section("page")
    <div class="page-title">Управление опросами</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="alert alert-danger">
            {!! \Session::get('error') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="polls/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'created_at' => 'Дата создания',
            'question' => 'Вопрос',
        ],
        "items" => $polls
    ])

@endsection
