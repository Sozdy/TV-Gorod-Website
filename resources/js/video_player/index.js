/*
* Для работы:
* 1) Подключить модуль в общий js
* 2) Разместить partial video_player_modal.blade.php на странице
* 3) Любому тегу на странице прописать data-youtube-url="{{ ссылка на youTube видео в любом формате }}"
* 4) Теперь при клике по этому тегу будет открываться модальное окно(если оно еще не открыто)
*    и в iframe запускаться видео. Если модальное окно уже открыто, просто заменит видео
* */
import {VideoPlayer} from "./video_player";
import {Playlist} from "./playlist";

const videoPlayer = new VideoPlayer("#videoPlayer")
const playList = new Playlist("#playlist")

window.playList = playList

document.addEventListener("click", (event) => {
        const youtubeUrl = event.target.dataset.youtubeUrl
        const youtubePlaylistUrl = event.target.dataset.youtubePlaylistUrl
        if (youtubeUrl) {
            event.preventDefault()

            $("#videoPlayerModal").modal("show")

            videoPlayer.playByUrl(youtubeUrl)

        } else if (youtubePlaylistUrl) {
            event.preventDefault()

            document.querySelector("#videoPlayerModal").classList.add("has-playlist")

            playList.getParams(youtubePlaylistUrl)
            .then(() => {
                playList.insertPlaylistToHTML()
                videoPlayer.playByVideoId(playList.lastVideoId)
                $("#videoPlayerModal").modal("show")
            })
        }
    }
)

$("#videoPlayerModal").on("hide.bs.modal", () => {
    videoPlayer.stop()
    playList.destroy()
})
