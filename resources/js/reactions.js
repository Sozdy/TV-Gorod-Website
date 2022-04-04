const reactionsContainer = document.querySelector("#reactions")
// У node list нет такого метода как filter, собираем все в обычный array
const reactions = [...document.querySelectorAll("#reactions img")]

if (reactionsContainer)
{
    var clicks = 0;

    const clickOnEmoji = function (event) {
        if(event.target.tagName === "IMG") {

            $(event.target).css("transform", "rotate("+(clicks++)+"deg) scale("+(1+clicks/10)+")");
            $(event.target).css("position", "relative");
            $(event.target).css("z-index", clicks);

            const incrementCounter = function () {
                let count = Number(event.target.nextElementSibling.innerText)
                event.target.nextElementSibling.innerText = count+1
            }

            const sendOnServer = function () {
                const newsSlug     = event.target.dataset.newsSlug
                const reactionName = event.target.dataset.reactionName

                $.get(`/news/${newsSlug}/react/${reactionName}`)
            }

            incrementCounter()

            sendOnServer()

            event.target.classList.remove("disabled")

            reactions.filter(node => node !== event.target).forEach(node => {
                node.classList.add("disabled")
            })
    }
}
    reactionsContainer.addEventListener("click", clickOnEmoji)
}
