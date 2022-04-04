@extends("admin.layout")

@section("page")
    <div class="page-title">Управление программами</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/tv-programs/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('name', 'Название программы') }}
        {{ Form::text('name', old('name') ?? $old->name ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('playlist_id', 'Код плейлиста YouTube') }}
        {{ Form::text('playlist_id', old('playlist_id') ?? $old->playlist_id ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('order', 'Позиция в списке (очередность)') }}
        {{ Form::number('order', old('order') ?? $old->order ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('active', 'Актуальная (НЕ архивная)') }}
        {{ Form::checkbox('active', true, old('active') ?? $old->active ?? true) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Изображение программы') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить программу', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
