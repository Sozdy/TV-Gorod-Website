@extends("admin.layout")

@section("page")
    <div class="page-title">Управление расписанием ТВ-программ</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/tv-schedule/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST")) }}

    <div class="form-group">
        {{ Form::label('program_name', 'Название программы') }}
        {{ Form::text('program_name', old('program_name') ?? $old->program_name ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('datetime', 'Дата и время') }}
        {{ Form::text('datetime', old('datetime') ?? $old->datetime ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('age_rating', 'Возрастное ограничение') }}
        {{ Form::number('age_rating', old('age_rating') ?? $old->age_rating ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
