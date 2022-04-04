const searchBtn = document.querySelector('#search-button')

let searchInput
let searchBtnClose

function toggleHideSearchInput() {
    searchInput.classList.toggle('show')
}

if(searchBtn) {
    searchInput = document.querySelector("#search-input")
    searchBtnClose = searchInput.querySelector(".search-btn-close")

    searchBtnClose.addEventListener('click', toggleHideSearchInput)
    searchBtn.addEventListener('click', toggleHideSearchInput)
}
