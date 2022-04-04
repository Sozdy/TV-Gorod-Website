const $datePicker = document.getElementById('data-picker')


if ($datePicker) {
    const $datePickerContainer = document.querySelector('.data-picker-container')
    const $date = $datePicker.querySelector('.date')
    const $backdrop = $datePickerContainer.querySelector(".backdrop")


    if(window.location.search.length) {
        const urlParams        = new URLSearchParams(window.location.search)
        const selectedMonth    = new Date(urlParams.get('date')).getMonth()
        const selectedDate     = new Date(urlParams.get('date')).getDate()
        const selectedFullYear = new Date(urlParams.get('date')).getFullYear()

        $date.innerText = `${selectedDate}.${selectedMonth + 1}.${selectedFullYear}`
    }

    $datePicker.addEventListener("click", () => {
        $datePickerContainer.classList.toggle("open")
        $backdrop.classList.toggle("open")
    })

    $backdrop.addEventListener("click", () => {
        $datePickerContainer.classList.toggle("open")
        $backdrop.classList.toggle("open")
    })
}
