@extends("admin.layout")

@section("page")
    <div class="page-title">Управление новостями</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('url' => '/admin/news/' . ($old->slug ?? ""), 'files' => true, 'method' => isset($old) ? "PUT" : "POST")) }}

    <h4>Основная информация</h4>

    <div class="form-group">
        {{ Form::label('title', 'Заголовок новости') }}
        {{ Form::text('title', old('title') ?? $old->title ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'URL новости') }}
        {{ Form::text('slug', old('slug') ?? $old->slug ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('published_at', 'Время публикации') }}
        {{ Form::input('dateTime-local', 'published_at', old('published_at') ?? $old->published_at ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('short_description', 'Короткое описание') }}
        {{ Form::text('short_description', old('short_description') ?? $old->short_description ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Полный текст новости') }}
        <div contenteditable="true" style="height: auto; max-height: 80vh; overflow-y: scroll; display:inline-block;" class="form-control mb-2" oninput="processRT(this)">
            {!! old('description') ?? $old->description ?? "" !!}
        </div>

        <div class="d-none">
            {{ Form::textarea('description', old('description') ?? $old->description ?? "", array('class' => 'form-control')) }}
        </div>

        <input type="button" value="Цитата" class="btn btn-success" onclick="document.execCommand('formatBlock', false, '<blockquote>')">

        <input type="button" value="Курсив"       class="btn btn-info" onclick="document.execCommand('italic')">
        <input type="button" value="Жирный"       class="btn btn-info" onclick="document.execCommand('bold')">
        <input type="button" value="Подчеркнутый" class="btn btn-info" onclick="document.execCommand('underline')">
    </div>

    <hr />

    <h4>Закрепление новости</h4>

    <div class="form-group">
        {{ Form::checkbox('is_hot', 1, old('is_hot') ?? $old->is_hot ?? "", array('id' => 'is_hot')) }}
        {{ Form::label('is_hot', 'Горячая') }}
    </div>

    <div class="form-group">
        {{ Form::checkbox('is_main', 1, old('is_main') ?? $old->is_main ?? "", array('id' => 'is_main')) }}
        {{ Form::label('is_main', 'Главная') }}
    </div>

    <div class="form-group">
        {{ Form::checkbox('is_first', 1, old('is_first') ?? $old->is_first ?? "", array('id' => 'is_first')) }}
        {{ Form::label('is_first', 'Первая') }}
    </div>

    <hr />

    <h4>Медиа-материалы</h4>

    <div class="form-group">
        {{ Form::label('image', 'Изображение новости') }}
        <br />
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('video_link', 'Ссылка на видео YouTube') }}
        {{ Form::text('video_link', old('video_link') ?? $old->video_link ?? "", array('class' => 'form-control')) }}
    </div>

    <hr />

    <h4>Дополнительно</h4>

    <div class="form-group">
        {{ Form::label('news_category_id', 'Категория новости') }}
        {{ Form::select('news_category_id', App\Http\Controllers\NewsCategoriesController::list(), old('news_category_id') ?? $old->news_category_id ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('text_author', 'Автор текста') }}
        {{ Form::text('text_author', old('text_author') ?? $old->text_author ?? "", array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo_author', 'Автор фото') }}
        {{ Form::text('photo_author', old('photo_author') ?? $old->photo_author ?? "", array('class' => 'form-control')) }}
    </div>

    <hr />

    <h4>Настройки экспорта</h4>

    <div class="form-group">
        {{ Form::checkbox('export_news', 1, old('export_news') ?? $old->export_news ?? "", array('id' => 'export_news')) }}
        {{ Form::label('export_news', 'Экспортировать в Яндекс.Новости и Google News') }}
    </div>

    <div class="form-group">
        {{ Form::checkbox('export_telegram', 1, old('export_telegram') ?? $old->export_telegram ?? "", array('id' => 'export_telegram')) }}
        {{ Form::label('export_telegram', 'Экспортировать в Telegram, Twitter') }}
    </div>

    <div class="form-group">
        {{ Form::checkbox('export_social_webs', 1, old('export_social_webs') ?? $old->export_social_webs ?? "", array('id' => 'export_social_webs')) }}
        {{ Form::label('export_social_webs', 'Экспортировать в Одноклассники и ВКонтакте') }}
    </div>

    <div class="form-group">
        {{ Form::label('export_description', 'Короткое описание для экспорта в Одноклассники, ВКонтакте, Twitter, Telegram') }}
        {{ Form::text('export_description', old('export_description') ?? $old->export_description ?? "", array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Сохранить новость', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
