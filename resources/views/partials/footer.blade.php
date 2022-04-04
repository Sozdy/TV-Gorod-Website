<div class="footer container-fluid">
    <img src="/img/icons/city_big_bg.svg" class="d-none d-lg-block city-big-bg">
    <img src="/img/icons/citi_small_bg.svg" class="d-lg-none city-small-bg">
    <div class="container-xl h-100">
        <div class="row content h-100 pt-5">
            <div class="col-3 col-md-2 pr-md-3 h-100 logo">
                <a href="{{ url('/') }}">
                    <img class="" src="/img/navbar-logo.png">
                </a>
            </div>
            <div class="col h-100">
                <div class="row">
                    <div class="links d-none d-md-flex col-md-12">
                        <a class="link" href="{{ url('/') }}">
                            Главная
                        </a>
                        <a class="link"
                           href="{{ url('/programs') }}">
                            Программы
                        </a>
                        <a class="link"
                           href="{{ url('/tv-programs') }}">
                            ТВ-программа
                        </a>
                        <a class="link"
                           href="{{ url('/about') }}">
                            Об агентстве
                        </a>
                        <a class="link"
                           href="{{ url('/contacts') }}">
                            Контакты
                        </a>
                    </div>

                    <div class="links d-flex d-md-none col-6">
                        <div class="col-6 link-md p-0">
                            <a class="link d-block"
                               href="{{ url('/programs') }}">
                                Программы
                            </a>
                            <a class="link d-block"
                               href="{{ url('/about') }}">
                                Об агентстве
                            </a>
                        </div>
                        <div class="col-6 link-md p-0">

                            <a class="link d-block"
                               href="{{ url('/tv-programs') }}">
                                ТВ-программа
                            </a>
                            <a class="link d-block"
                               href="{{ url('/contacts') }}">
                                Контакты
                            </a>
                        </div>
                    </div>
                    <div class="footer-info col-6 col-md-12 pr-0 pr-md-3">
                        Сетевое издание твгород.рф.
                        <br>
                        Свидетельство о регистрации СМИ Эл № ФС77-82669 от 18 января 2022 г., выдано Федеральной службой по надзору в сфере связи, информационных технологий и массовых коммуникаций.
                        <br>
                        Учредитель: Муниципальное предприятие «Информационное агентство «Город»
                        <br>
                        Главный редактор: Слепцова К.С. 
                        <br>
                        Телефон редакции: 8 (4162) 52-42-02
                        <br>
                        Электронная почта: blagtv@mail.ru
                        <br>
                        <br>
                        2006-{{ date('Y') }} © Муниципальное учреждение “Информационное агентство “Город”
                        <br>
                        Все права на любые материалы, опубликованные на сайте, защищены в соответствии с российским и международным законодательством об интеллектуальной собственности.
                        <br>
                        18+ (запрещено для детей).
                    </div>
                </div>
            </div>

            <div class="col-2 h-100 logo">
                <!--LiveInternet counter--><a href="https://www.liveinternet.ru/click"
                target="_blank"><img id="licnt03AA" width="88" height="31" style="border:0" 
                title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня"
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7"
                alt=""/></a><script>(function(d,s){d.getElementById("licnt03AA").src=
                "https://counter.yadro.ru/hit?t14.5;r"+escape(d.referrer)+
                ((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"*"+
                (s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+
                ";h"+escape(d.title.substring(0,150))+";"+Math.random()})
                (document,screen)</script><!--/LiveInternet-->
            </div>
        </div>
    </div>
</div>
