<div class="admin-navbar">
    <div class="show-hide" onclick="$('.admin-navbar').toggleClass('opened')"></div>

    <div class="text-center">
        <a href="/"><img src="/img/navbar-logo.png" class="w-75 my-3"></a>
    </div>

    <form action="/admin/search" method="GET" class="d-flex justify-content-center">
        <input type="text" name="query" placeholder="Поиск..." style="background: none; border: 1px solid white; width: 120px; color: white;">
        &nbsp;
        <button style="background: none; border: none;">
            <span class="glyphicon glyphicon-search text-white"></span>
        </button>
    </form>

    <br/>

    <a href="/admin" class="item {{ Request::segment(2) == "" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-home"></span>
        Главная
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/news" class="item {{ Request::segment(2) == "news" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-bullhorn"></span>
        Новости
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/news-categories" class="item {{ Request::segment(2) == "news-categories" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-tags"></span>
        Категории
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/tv-programs" class="item {{ Request::segment(2) == "tv-programs" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-facetime-video"></span>
        Программы
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/tv-schedule" class="item {{ Request::segment(2) == "tv-schedule" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-time"></span>
        ТВ-программа
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/polls" class="item {{ Request::segment(2) == "polls" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-list-alt"></span>
        Опросы
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/ads" class="item {{ Request::segment(2) == "ads" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-usd"></span>
        Реклама
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/employees" class="item {{ Request::segment(2) == "employees" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-user"></span>
        Коллектив
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

{{--    <a href="/admin/video" class="item {{ Request::segment(2) == "video" ? "active" : "" }}">--}}
{{--        <span class="icon glyphicon glyphicon-film"></span>--}}
{{--        Видео--}}
{{--        <span class="arrow glyphicon glyphicon-chevron-right"></span>--}}
{{--    </a>--}}

    <a href="/admin/promo" class="item {{ Request::segment(2) == "promo" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-flag"></span>
        Промо
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a href="/admin/live" class="item {{ Request::segment(2) == "live" ? "active" : "" }}">
        <span class="icon glyphicon glyphicon-play"></span>
        Прямой эфир
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <a class="item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="icon glyphicon glyphicon-log-out"></span>
        Выйти
        <span class="arrow glyphicon glyphicon-chevron-right"></span>
    </a>

    <form id="logout-form" action="/logout" method="POST" class="d-none">
        {{ csrf_field() }}
    </form>
</div>
