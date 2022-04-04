const btn = document.querySelector('#up-button')
const rootElement = document.documentElement

function toggleScroll(e) {
    if (!btn)
        return;

    let scrollTotal = rootElement.scrollHeight - rootElement.clientHeight

    if ((rootElement.scrollTop ) > 100) {
        if (btn)
            btn.classList.add('show')
    } else {
        if (btn)
            btn.classList.remove('show')
    }
}

function scrollToTop(e) {
    e.preventDefault();
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
    })
}

window.addEventListener('scroll', toggleScroll,false)

if (btn)
    btn.addEventListener("click", scrollToTop)
