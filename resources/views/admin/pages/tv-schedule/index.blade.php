@extends("admin.layout")

@section("page")
    <div class="page-title">Управление расписанием ТВ-программ</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="tv-schedule/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'created_at' => 'Время',
            'program_name' => 'Программа',
            'age_rating' => 'Возраст',
        ],
        "items" => $tv_schedule
    ])

@endsection
