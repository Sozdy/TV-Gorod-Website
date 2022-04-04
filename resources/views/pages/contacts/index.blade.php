@extends('layouts.default')

@section("title", "Контакты Город 24")

@section("page")


    <div class="container-xl content-bg contacts-page pt-4 pb-4">
        <div class="row mb-4">
            <div class="col-12 col-lg-6">
                @include('partials.contacts_information_block')
            </div>

            <div class="d-none d-lg-block col-6">
                <img class="contact-img" src="/img/contacts_contact_img.jpg" alt="ТВ-Город контакты">
            </div>
        </div>
        <div class="mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573.026184986087!2d127.53209326894986!3d50.264237323167094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5e8941a1481f24eb%3A0x81c133ae6781cf37!2z0J_QuNC-0L3QtdGA0YHQutCw0Y8g0YPQuy4sIDMx!5e0!3m2!1sru!2sru!4v1603391112990!5m2!1sru!2sru" width="100%" height="275" frameborder="0" style="border: 0.5px solid rgba(0, 0, 0, 0.1); filter: drop-shadow(1px 1px 15px rgba(0, 0, 0, 0.1));" allowfullscreen="" aria-hidden="true" tabindex="0"></iframe>
        </div>
    </div>
@endsection
