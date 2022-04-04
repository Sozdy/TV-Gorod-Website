@extends("admin.layout")

@section("page")
    <div class="page-title">Управление прямым эфиром</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/live/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('link', 'Ссылка') }}
        {{ Form::text('link', old('link') ?? $old->link ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
