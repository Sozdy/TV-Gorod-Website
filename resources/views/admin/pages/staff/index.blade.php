@extends("admin.layout")

@section("page")
    <div class="page-title">Управление сотрудниками</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="text-right">
        <a href="employees/create" class="btn btn-success">Добавить</a>
    </div>

    <hr />

    @include("admin.partials.list", [
        "rows" => [
            'name' => 'ФИО',
            'role' => 'Должность',
        ],
        "items" => $staff
    ])

@endsection
