@extends("admin.layout")

@section("page")
    <div class="page-title">Управление опросами</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/polls/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('question', 'Вопрос') }}
        {{ Form::text('question', old('question') ?? $old->question ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('answers', 'Ответы') }}
        {{ Form::textarea('answers', old('answers') ?? $old->answers ?? "", array('class' => 'form-control')) }}
        <span class="small">Пожалуйста, указывайте каждый ответ на новой строке</span>
    </div>

    {{ Form::submit('Сохранить опрос', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
