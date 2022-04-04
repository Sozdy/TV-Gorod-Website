const buttons = [...document.querySelectorAll('.share__more')]
const tooltip = document.querySelector('#tooltip')
const toggleEvents = ['click']
let prevButton
let nextButton

let popperInstance = null

function create(button) {
    popperInstance = new Popper(button, tooltip, {
        placement: 'bottom-end',
        modifiers: [
            {
                name: 'offset',
                options: {
                    offset: [0, 0],
                },
            },
        ],
    })
}



function show(button) {
    tooltip.setAttribute('data-show', '')
    create(button);
}

function hide() {
    if (tooltip)
        tooltip.removeAttribute('data-show')
    destroy();
}

function destroy() {
    if (popperInstance) {
        popperInstance.destroy()
        popperInstance = null
        prevButton = null
    }
}


function togglePropper(event) {
    if (buttons.includes(event.target)) {
        event.preventDefault()
        nextButton = event.target
        if (prevButton === nextButton) {
            hide()
            return
        }
        prevButton = nextButton
        show(event.target)
    } else {
        hide()
    }
}

toggleEvents.forEach(event=>{
    document.addEventListener(event, togglePropper)
})
