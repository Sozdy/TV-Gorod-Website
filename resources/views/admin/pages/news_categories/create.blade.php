@extends("admin.layout")

@section("page")
    <div class="page-title">Управление категориями новостей</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/news-categories/' . ($old->slug ?? ""), 'method' => isset($old) ? "PUT" : "POST")) }}

    <div class="form-group">
        {{ Form::label('name', 'Название категории') }}
        {{ Form::text('name', old('name') ?? $old->name ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'URL категории') }}
        {{ Form::text('slug', old('slug') ?? $old->slug ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить категорию', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
