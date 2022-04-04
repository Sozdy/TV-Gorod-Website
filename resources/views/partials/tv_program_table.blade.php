<?php
    $today = app('request')->input('date') ?? \Carbon\Carbon::now()->format("Y-m-d");

    function getLocalizedByShift($today, $i) {
        return \Carbon\Carbon::createFromFormat("Y-m-d", $today)->addDays($i)->formatLocalized("%a %d %b");
    }

    function getByShift($today, $i) {
        return \Carbon\Carbon::createFromFormat("Y-m-d", $today)->addDays($i)->format("Y-m-d");
    }
?>

<div class="tv-program-table">

    <div class="row date-slider mb-4">
        <a class="d-block col-auto arrow" href="{{ url('/tv-programs?date='.\Carbon\Carbon::createFromFormat("Y-m-d", $today)->addDays(-1)->format("Y-m-d")) }}">
            <img class="arrow-left" src="/img/icons/slider-arrow-left.svg" alt="">
        </a>

        <div class="col dates-container row p-0">

            @for($i = -1; $i < 6; $i++)

                <a href="{{ url('/tv-programs?date='.getByShift($today, $i)) }}"
                   class="col date-item-container {{ getByShift($today, $i) == $today ? "active" : "" }}">
                    <div class=" date d-xl-flex">{{ getLocalizedByShift($today, $i) }}</div>
                </a>

            @endfor

        </div>

        <a class="d-block col-auto arrow" href="{{ url('/tv-programs?date='.\Carbon\Carbon::createFromFormat("Y-m-d", $today)->addDays(1)->format("Y-m-d")) }}">
            <img class="arrow-right" src="/img/icons/slider-arrow-right.svg" alt="">
        </a>
    </div>

    @foreach(\App\Models\TvSchedule::getByDay($today) as $item)
        <div class="row tv-program-item m-0">
            <div class="col-1 time">
                {{ \Carbon\Carbon::createFromDate($item->datetime)->format("H:i") }}
            </div>
            <div class="col tv-program-name">
                {{ $item->program_name }}
            </div>
            <div class="col-1 age-restrictions">
                {{ $item->age_rating }}{{$item->age_rating > -1 ? "+" : "" }}
            </div>
        </div>
    @endforeach

    @if(\App\Models\TvSchedule::getByDay($today)->count() == 0)
        К сожалению, на этот день телепрограммы еще нет
    @endif

</div>
