@extends("admin.layout")

@section("page")
    <div class="page-title">Управление промо</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/promo/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('text', 'Текст') }}
        {{ Form::text('text', old('text') ?? $old->text ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('video_id', 'Код видео YouTube') }}
        {{ Form::text('video_id', old('video_id') ?? $old->video_id ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('link', 'Ссылка') }}
        {{ Form::text('link', old('link') ?? $old->link ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Изображение') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить промо', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
