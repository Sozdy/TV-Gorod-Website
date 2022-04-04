const $daysSwitcher = document.getElementById('days-switcher')

function shiftDate(selectedDay, shift) {
    let date = new Date(selectedDay)

    date.setDate(selectedDay.getDate() + shift)

    return date.getFullYear() + "-" + (date.getMonth() + 1) + '-' + date.getDate()
}

function getNewsByDate(date) {
    const url = new URL(window.location.href.split('?')[0]) // Текущий url страницы без параметров

    url.searchParams.set('date', date)

    window.location = url
}

if ($daysSwitcher) {

    const $nextDay = $daysSwitcher.querySelector(".next-day")
    const $prevDay = $daysSwitcher.querySelector(".prev-day")

    const urlSearch = window.location.search

    function getSelectedDayFromUrlSearch(urlSearch) {

        let selectedMonth
        let selectedDate
        let selectedFullYear

        if (urlSearch.length) {
            const date = new Date(new URLSearchParams(urlSearch).get('date')) // Получаем выбранную дату

            selectedMonth = date.getMonth() + 1
            selectedDate = date.getDate()
            selectedFullYear = date.getFullYear()
        } else {
            const date = new Date()

            selectedMonth = date.getMonth() + 1
            selectedDate = date.getDate()
            selectedFullYear = date.getFullYear()
        }

        return new Date(`${selectedMonth}.${selectedDate}.${selectedFullYear}`)
    }

    let selectedDay = getSelectedDayFromUrlSearch(urlSearch)


    $nextDay.addEventListener("click", () => {
        getNewsByDate(shiftDate(selectedDay, 1))
    })

    $prevDay.addEventListener("click", () => {
        getNewsByDate(shiftDate(selectedDay, -1))
    })
}
