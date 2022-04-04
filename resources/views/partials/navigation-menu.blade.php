<div id="navbar" class="partial-navbar">
    <div class="navbar">
        <div class="container-xl h-100">
                <div class="content h-100">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="/img/navbar-logo.png">
                    </a>

                    <div class="d-none d-md-flex flex-grow-1 justify-content-center links h-100">
                        <a class="link d-none d-lg-flex {{ Route::currentRouteName() == 'index'      ? 'active' : '' }}"
                           href="{{ url('/') }}">
                            Главная
                        </a>
                        <a class="link {{ Route::currentRouteName() == 'programs'   ? 'active' : '' }}"
                           href="{{ url('/programs') }}">
                            Программы
                        </a>
                        <a class="link {{ Route::currentRouteName() == 'tv-programs'? 'active' : '' }}"
                           href="{{ url('/tv-programs') }}">
                            ТВ&nbsp;программа
                        </a>
                        <a class="link {{ Route::currentRouteName() == 'about'      ? 'active' : '' }}"
                           href="{{ url('/about') }}">
                            Об&nbsp;агентстве
                        </a>
                        <a class="link {{ Route::currentRouteName() == 'contacts'   ? 'active' : '' }}"
                           href="{{ url('/contacts') }}">
                            Контакты
                        </a>
                        <a class="link"
                           href="{{ url('/tv-programs') }}">
                            <div class="live-link text-center">
                                <img src="/img/icons/social/play-live.svg" alt="Прямой эфир" class="social" style="width: 30px; margin-top: -3px;">
                                Прямой эфир
                            </div>
                        </a>
                    </div>


                    <img class="d-none d-md-block search-button" id="search-button" src="/img/icons/search.svg">
                    <form action="/search" id="search-input">
                        <input class="search-input" type="text" name="query" placeholder="Введите поисковой запрос">
                        <button style="border: 0; padding: 0;">
                            <img class="search-btn" src="/img/icons/search_btn.svg" alt="">
                        </button>
                        <img class="search-btn-close" src="/img/icons/search_btn_close.svg" alt="">
                    </form>


                    <div class="d-block d-md-none navbar-burger">
                        <span></span>
                    </div>
                </div>
        </div>
    </div>


    <div class="d-md-none mobile-navbar">
        <div class="links-container">
            <a class="link p-4 {{ Route::currentRouteName() == 'index'      ? 'active' : '' }}"
               href="{{ url('/') }}">
                Главная
            </a>
            <a class="link p-4 {{ Route::currentRouteName() == 'programs'   ? 'active' : '' }}"
               href="{{ url('/programs') }}">
                Программы
            </a>
            <a class="link p-4 {{ Route::currentRouteName() == 'tv-programs'? 'active' : '' }}"
               href="{{ url('/tv-programs') }}">
                    ТВ&nbsp;программа
            </a>
            <a class="link p-4"
               href="{{ url('/tv-programs') }}">

                <div class="live-link text-center">
                    <img src="/img/icons/social/play-live.svg" alt="Прямой эфир" class="social" style="width: 30px; margin-top: -3px;">
                    &nbsp;
                    Прямой эфир
                </div>
            </a>
            <a class="link p-4 {{ Route::currentRouteName() == 'about'      ? 'active' : '' }}"
               href="{{ url('/about') }}">
                Об&nbsp;агентстве
            </a>
            <a class="link p-4 {{ Route::currentRouteName() == 'contacts'   ? 'active' : '' }}"
               href="{{ url('/contacts') }}">
                Контакты
            </a>
        </div>

{{--        <img class="search-button" src="/img/icons/search.svg">--}}
    </div>
</div>

