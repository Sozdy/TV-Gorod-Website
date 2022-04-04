const iframe = document.querySelector("#gif_add")

if (iframe) {
    function setWidth() {
        let targetWidth = iframe.contentWindow.innerWidth / 1000;
        iframe.contentWindow.document.getElementById("animation_container").style.transform = 'scale(' + targetWidth + ')'
        iframe.style.height = targetWidth * 150 + "px"
        iframe.parentElement.style.height = targetWidth * 150 + "px"
    }

    iframe.onload = function () {
        setWidth()
        window.addEventListener("resize", setWidth)
    }
}
