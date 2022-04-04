@extends("admin.layout")

@section("page")
    <div class="page-title">Результаты поиска</div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="content container">
        <div class="row">
            <div class="col-12">
                <h2>Новости</h2>

                @foreach($results["news"] as $item)
{{--                    lol--}}
                @endforeach

                @include("admin.partials.list", [
                    "rows" => [
                        'created_at' => 'Дата',
                        'title' => 'Заголовок',
                        'short_description' => 'Описание',
                    ],
                    "items" => $results["news"],
                    "route" => "news",
                    "key" => "slug"
                ])
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-12">
                <h2>Программы</h2>

{{--                @foreach($results["news"] as $item)--}}
{{--                    lol--}}
{{--                @endforeach--}}

                @include("admin.partials.list", [
                    "rows" => [
                        'name' => 'Название',
                        'playlist_id' => 'Код плейлиста YouTube',
                        'active' => 'Актуальная',
                    ],
                    "items" => $results["tv_programs"],
                    "route" => "tv-programs",
                    "key" => "id"
                ])
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-12">
                <h2>Расписание ТВ-программ</h2>

                @foreach($results["tv_schedule"] as $item)
{{--                    {{ $loop->index+1 }}--}}
                @endforeach

                @include("admin.partials.list", [
                    "rows" => [
                        'datetime' => 'Время',
                        'program_name' => 'Программа',
                        'age_rating' => 'Возраст',
                    ],
                    "items" => $results["tv_schedule"],
                    "route" => "tv-schedule",
                    "key" => "id"
                ])
            </div>
        </div>
    </div>

@endsection
