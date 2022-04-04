@extends("admin.layout")

@section("page")
    <div class="page-title">Панель администратора</div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hello-block">
                    <a href="/admin/news" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=1')">
                        <span class="icon glyphicon glyphicon-bullhorn"></span>
                        <span>Новости</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/news-categories" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=20')">
                        <span class="icon glyphicon glyphicon-tags"></span>
                        <span>Категории</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/tv-programs" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=30')">
                        <span class="icon glyphicon glyphicon-facetime-video"></span>
                        <span>Программы</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/tv-schedule" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=40')">
                        <span class="icon glyphicon glyphicon-time"></span>
                        <span>ТВ-программа</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/polls" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=50')">
                        <span class="icon glyphicon glyphicon-list-alt"></span>
                        <span>Опросы</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/ads" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=60')">
                        <span class="icon glyphicon glyphicon-usd"></span>
                        <span>Реклама</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/staff" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=70')">
                        <span class="icon glyphicon glyphicon-user"></span>
                        <span>Коллектив</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

{{--                    <a href="/admin/video" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=80')">--}}
{{--                        <span class="icon glyphicon glyphicon-film"></span>--}}
{{--                        <span>Видео</span>--}}
{{--                        <span class="arrow glyphicon glyphicon-chevron-right"></span>--}}
{{--                    </a>--}}

                    <a href="/admin/promo" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=90')">
                        <span class="icon glyphicon glyphicon-flag"></span>
                        <span>Промо</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="/admin/live" class="link-box" style="bbackground-image: url('https://picsum.photos/200/150?blur=5&v=90')">
                        <span class="icon glyphicon glyphicon-play"></span>
                        <span>Прямой эфир</span>
                        <span class="arrow glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
