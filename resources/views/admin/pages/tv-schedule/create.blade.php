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
        {{ Form::label('schedule', 'Расписание') }}
        {{ Form::textarea('schedule', old('schedule') ?? $old->schedule ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
