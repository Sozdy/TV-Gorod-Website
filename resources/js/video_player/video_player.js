export class VideoPlayer {
    constructor(selector) {
        this.$el = document.querySelector(selector)
    }

    static youtubeParserVId (youtubeUrl) {
        // возвращает id видео из ссылки на YouTube видео
        let regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/
        let match = youtubeUrl.match(regExp)
        return (match && match[1].length == 11) ? match[1] : false
    }


    playByUrl(youtubeUrl) {
        if (this.$el) {
            const VideoId = VideoPlayer.youtubeParserVId(youtubeUrl)

            this.playByVideoId(VideoId)
        }
    }

    playByVideoId(VideoId) {
        if (this.$el) {
            const iframeYoutubeUrl =`https://www.youtube.com/embed/${VideoId}?autoplay=1`

            this.$el.querySelector("iframe").src = `${iframeYoutubeUrl}`
        }
    }


    stop() {
        this.$el.querySelector("iframe").src = ``

    }
}
