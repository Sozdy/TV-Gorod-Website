@include("components.h2", ["color" => "red", "text" => "Контакты"])

<div class="contacts-information-block">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="content pt-3 pl-3 pr-3 pb-0 pb-sm-3">

                <div class="content-item mb-4">
                    <h4>Редакция ТВ, сайта</h4>
                    <a href="tel:+74162524202">
                        Тел.: +7 (4162) 52-42-02
                    </a>
                    <br>
                    <a href="mailto:blagtv@mail.ru">
                        E-mail: blagtv@mail.ru
                    </a>
                </div>

                <div class="content-item mb-4">
                    <h4>Бухгалтерия</h4>
                    <a href="tel:+74162532093">
                        Тел.: +7 (4162) 53-20-93
                    </a>
                </div>

                <div class="content-item mb-4">
                    <h4>Юрист</h4>
                    <a href="tel:+74162773449">
                        Тел.: +7 (4162) 773-449
                    </a>
                </div>

                <div class="content-item mb-4">
                    <h4>Отдел кадров</h4>
                    <a href="tel:+74162494151">
                        Тел.: +7 (4162) 49-41-51
                    </a>
                </div>

            </div>
        </div>
        <div class="col-12 col-sm-6 vertical-line">
            <div class="content p-3">

                <div class="content-item mb-4">
                    <h4>Реклама на ТВ</h4>
                    <a href="tel:+74162773445">
                        Тел.: +7 (4162) 773-445
                    </a>
                </div>

                <div class="content-item mb-4">
                    <h4>Реклама на сайте и в соцмедиа</h4>
                    <a href="tel:+74162522373">
                        Тел.: +7 (4162) 522-373
                    </a>
                </div>

                <div class="content-item">
                    <h4>Юридический и почтовый адрес:</h4>
                    <p>
                        Муниципальное учреждение "Информационное агентство "Город": 675000, <br>
                        Амурская область, г.Благовещенск, <br>
                        ул. Пионерская, д. 31, этаж 2
                    </p>
                </div>

                <div class="content-item mb-4 d-none">
                    <h4>Социальные сети</h4>

                    <div class="social-buttons">
                        @for($i = 0; $i < 6; $i++)
                            <a href="#">
                                <img class="social-button" src="/img/icons/social/vk.svg">
                            </a>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
