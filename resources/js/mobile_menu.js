$(document).ready(()=>{
    $('.navbar-burger').click(()=>{
        $('.navbar-burger, .mobile-navbar').toggleClass('active')
        $('body').toggleClass('lock')
    })
})
