@extends("admin.layout")

@section("page")
    <div class="page-title">Управление сотрудниками</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/employees/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('name', 'ФИО') }}
        {{ Form::text('name', old('name') ?? $old->name ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('role', 'Должность') }}
        {{ Form::text('role', old('role') ?? $old->role ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('category', 'Категория') }}
        {{ Form::select('category', [
                1 => "Редакция службы новостей",
                2 => "Рекламная служба",
                3 => "Руководство",
                4 => "Редакция телеканала",
                5 => "Хозяйственный отдел",
                6 => "Административный отдел"
            ], old('category') ?? $old->category ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Фото') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить сотрудника', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
