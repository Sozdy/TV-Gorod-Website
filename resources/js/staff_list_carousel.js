const carouselsIdList = ['editorial-department', 'advertising-department', 'management-department']

function isJQueryObjExistOnPage(JQueryObj) {
    return !!JQueryObj.length
}

carouselsIdList.forEach((carouselId) => {
    let carousel = $(`#${carouselId}`)

    if (isJQueryObjExistOnPage(carousel)) {
        carousel.on('slide.bs.carousel', e => {

            let $e = $(e.relatedTarget);
            let idx = $e.index(`#${carouselId} .carousel-item`);
            let itemsPerSlide = 3;
            let totalItems = $(`#${carouselId} .carousel-item`).length;
            console.log(e.relatedTarget)

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                let it = itemsPerSlide - (totalItems - idx);
                for (let i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction === "left") {
                        $(`#${carouselId} .carousel-item`).eq(i).appendTo(`#${carouselId} .carousel-inner`);
                    } else {
                        $(`#${carouselId} .carousel-item`).eq(0).appendTo(`#${carouselId} .carousel-inner`);
                    }
                }
            }
        });
    }
})
