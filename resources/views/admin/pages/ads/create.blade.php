@extends("admin.layout")

@section("page")
    <div class="page-title">Управление рекламными баннерами</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/ads/' . ($old->id ?? ""), 'method' => isset($old) ? "PUT" : "POST", 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('name', 'Наименование (видно только администратору)') }}
        {{ Form::text('name', old('name') ?? $old->name ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('link', 'Ссылка') }}
        {{ Form::text('link', old('link') ?? $old->link ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('order', 'Очередность в ротации') }}
        {{ Form::number('order', old('order') ?? $old->order ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Изображение баннера') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_active', 'Активно') }}
        {{ Form::checkbox('is_active', 1, old('is_active') ?? $old->is_active ?? "") }}
    </div>

    <div class="form-group">
        {{ Form::label('ads_position_id', 'Позиция') }}
        {{ Form::select('ads_position_id', App\Http\Controllers\AdsPositionController::list(), old('ads_position_id') ?? $old->ads_position_id ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить баннер', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
