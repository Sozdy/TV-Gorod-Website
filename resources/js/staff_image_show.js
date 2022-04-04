const images = [...document.querySelectorAll('.staff-image')]
const slide = document.querySelector('#staff_image_slide')
const closeBtn = slide.querySelector('.close-btn')
const photoContainer = slide.querySelector('.staff_photo-container')
const toggleEvents = ['click']


function toggleSlide(event) {
    if (images.includes(event.target)) {
        event.preventDefault()

        slide.querySelector('.staff_photo').setAttribute('src', event.target.getAttribute("src"))
        slide.querySelector('.staff_photo').setAttribute('alt', event.target.getAttribute("alt"))

        slide.classList.add('show')
    }

    if(event.target === slide || event.target ===  closeBtn || event.target === photoContainer){
        slide.querySelector('.staff_photo').setAttribute('src', '')
        slide.querySelector('.staff_photo').setAttribute('alt', '')

        slide.classList.remove('show')
    }
}

toggleEvents.forEach(event=>{
    document.addEventListener(event, toggleSlide)
})
