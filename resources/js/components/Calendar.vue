<template>
    <div>
        <div class="calendar">
            <table class="table">
                <thead>
                <tr>
                    <td class="decrease" @click="decrease">
                        <div>
                            <img class="arrow-left" src="/img/icons/slider-arrow-right.svg" alt="">
                        </div>
                    </td>
                    <td colspan="5"> {{ monthes[month] }} {{ year }}</td>
                    <td class="increase" @click="increase">
                        <div>
                            <img class="arrow-right" src="/img/icons/slider-arrow-right.svg" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="day-name" v-for="d in day">{{ d }}</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="week in calendar()">
                    <td v-for="(day) in week" @click="getNewsByDate(day.index)"
                        :class="{'day-number' : day.index !== undefined,
                                 'selected-day' : day.selected,
                                 'current-day' : day.current,
                                 'hover-effect' : !(day.selected || day.current)}"
                        :style="{'background-color': day.current}">
                        {{ day.index }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Calendar",
        data() {
            return {
                url: new URL(window.location.href.split('?')[0]), // Текущий url страницы без параметров
                month: this.getMonth(),
                dFirstMonth: '1',
                day: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
                monthes: [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                date: this.getDay(),
                year: this.getYear(),
            }
        },

        methods: {
            getDay: function() {
                if(window.location.search.length) {
                    const urlParams = new URLSearchParams(window.location.search)
                    return new Date(urlParams.get('date')).getDate()
                } else {
                    return new Date().getDate()
                }
            },
            getMonth: function() {
                if(window.location.search.length) {
                    const urlParams = new URLSearchParams(window.location.search)
                    return new Date(urlParams.get('date')).getMonth()
                } else {
                    return new Date().getMonth()
                }
            },

            getYear: function() {
                if(window.location.search.length) {
                    const urlParams = new URLSearchParams(window.location.search)
                    return new Date(urlParams.get('date')).getFullYear()
                } else {
                    return new Date().getFullYear()
                }
            },

            isMonday: function(i) {
                return new Date(this.year, this.month, i).getDay() != this.dFirstMonth
            },

            calendar: function () {
                let days = [];
                let week = 0;
                days[week] = [];
                let dlast = new Date(this.year, this.month + 1, 0).getDate();
                let a;
                for (let i = 1; i <= dlast; i++) {
                    if (this.isMonday(i)) {
                        a = {index: i};
                        days[week].push(a);
                        //выбранный день
                        if (i === this.getDay() && this.year === this.getYear() && this.month ===this.getMonth()) {
                            a.selected = true//'#ddd'
                        }
                        //текущий день
                        if (i === new Date().getDate() && this.year === new Date().getFullYear() && this.month === new Date().getMonth()) {
                            a.current = true//'#e25759'
                        }
                    } else {
                        week++;
                        days[week] = [];
                        a = {index: i};
                        days[week].push(a);
                        //выбранный день
                        if (i === this.getDay() && this.year === this.getYear() && this.month ===this.getMonth()) {
                            a.selected = true//'#ddd'
                        }
                        //текущий день
                        if ((i === new Date().getDate()) && (this.year === new Date().getFullYear()) && (this.month === new Date().getMonth())) {
                            a.current = true//'#e25759'
                        }
                    }
                }

                if (days[0].length > 0) {
                    for (let i = days[0].length; i < 7; i++) {
                        days[0].unshift('');

                    }
                }
                return days;
            },

            decrease: function () {
                this.month--;
                if (this.month < 0) {
                    this.month = 12;
                    this.month--;
                    this.year--;
                }
            },

            increase: function () {
                this.month++;
                if (this.month > 11) {
                    this.month = -1;
                    this.month++;
                    this.year++;
                }
            },

            getNewsByDate: function (day) {
                if (day === undefined)
                    return

                let date = this.year + "-" + (this.month + 1) + '-' + day

                this.url.searchParams.set('date', date)
                window.location = this.url
            }
        },
    }
</script>

<style scoped lang="stylus">
    .calendar
        margin-bottom: 30px
        width: 100%
        max-width 370px
        box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.1);

        .table
            border-collapse collapse
            width 100%
            table-layout fixed

            .decrease, .increase
                cursor pointer

                .arrow-left, .arrow-right
                    width: 8px
                    opacity 0.7
                    transition .3s

                &:hover
                    .arrow-left, .arrow-right
                        opacity 1

                .arrow-left
                    transform scale(-1)


            .day-number
                cursor pointer

            .hover-effect
                &:hover
                    background-color: #eee;

                &:active
                    cursor context-menu
                    background-color: #ddd;

            .current-day, .selected-day
                color: white;
                font-weight: 600

            .selected-day
                background-color: #ddd

            .current-day
                background-color: #e25759

        .format-week
            float right

        .table td
            text-align center
            border none
            padding 0.58rem

        .table
            background-color: #fff

        .table thead
            background-color #FAFFC3;

            .day-name
                text-transform uppercase
                font-family Montserrat
                font-size 16px
                line-height 26px
                transition .3s

</style>
