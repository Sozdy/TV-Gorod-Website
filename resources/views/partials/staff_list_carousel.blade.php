<div class="staff-list-carousel mb-4">
    {{--Статичный контейнер для staff--}}
    <div class="d-none d-lg-block static-staff">
        <div class="row">
            @foreach ($staff as $person)
                <div class="col-6 col-xl-4">
                    <div class="staff-container mb-4">
                        <div class="row m-0">
                            <div class="col-4 col-xl-5 staff-image-container">
                                <img class="staff-image" src="/img/staff/{{ $person["id"] }}.jpg"
                                     alt="Фото сотрудника {{ $person["name"] ?? "" }}">
                            </div>
                            <div class="col-8 col-xl-7 staff-container__text">
                                <div class="name">{{ $person["name"] ?? "" }}</div>
                                <div class="position">{{ $person["role"] ?? "" }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--Контейнер карусель для staff--}}
    <div class="d-lg-none carousel-staff">
        <div id="{{ $carouselId }}" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner row mx-auto" role="listbox">
                @foreach ($staff as $person)
                    <div class="carousel-item  col-4 {{$loop->first? 'active' : ''}}">
                        <div class="staff-container">
                            <div class="col-12 staff-image-container ">
                                <img class="staff-image mb-3" src="/img/staff/{{ $person["id"] }}.jpg"
                                     alt="Фото сотрудника {{ $person["name"] ?? "" }}">
                            </div>
                            <div class="col-12 staff-container__text">
                                <div class="name">{{ $person["name"] ?? "" }}</div>
                                <div class="position">{{ $person["role"] ?? "" }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-lg-none carousel-control">
                @if(count($staff) > 3)
                    <a class="carousel-control-prev" href="#{{ $carouselId }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#{{ $carouselId }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
