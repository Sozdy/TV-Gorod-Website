const axios = require('axios');

export class Playlist {
    constructor(selector) {
        this.$el = document.querySelector(selector)
        this.videosPlaylistId = []
        this.lastVideoId = ""
        this.playlistId = ""
        this.listVideoItems = []
        this.playlistContainer = this.$el ? this.$el.querySelector(".playlist-item-container") : undefined
    }

    async getParams(youtubePlaylistUrl) {
        const playlistSearch = new URL(youtubePlaylistUrl).search
        this.playlistId = new URLSearchParams(playlistSearch).get("list")

        return axios.get(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=${this.playlistId}&key=AIzaSyBCJ0YYXNZTfpMTHuFHKWgTNijJJ7lB-ck`)
        .then((response) => {

            this.parseData(response)

        }).catch(error => {
            console.log(error)

        })
    }

    parseData(response) {
        response.data.items.forEach(( item ) => {
            this.videosPlaylistId.push(item.snippet.resourceId.videoId)
        })

        this.lastVideoId = this.videosPlaylistId[0]

        response.data.items.forEach(( item ) => {
            this.listVideoItems.push({
                title: item.snippet.title,
                videoId: item.snippet.resourceId.videoId,
                channelTitle:  item.snippet.channelTitle,
                previewSrcMedium: item.snippet.thumbnails.medium.url
            })
        })
    }

    playlistItemHtml(titleVideo, channelTitle, previewSrc, videoId) {
        return `
            <div class="playlist-item">
                <div class="preview" data-youtube-url="https://www.youtube.com/embed/${videoId}?autoplay=1">
                    <img src="${previewSrc}" data-youtube-url="https://www.youtube.com/embed/${videoId}?autoplay=1">
                </div>
                <div class="text" data-youtube-url="https://www.youtube.com/embed/${videoId}?autoplay=1">
                    <div class="title-video" data-youtube-url="https://www.youtube.com/embed/${videoId}?autoplay=1">
                        ${titleVideo}
                    </div>
                    <div class="playlist-title" data-youtube-url="https://www.youtube.com/embed/${videoId}?autoplay=1">
                        ${channelTitle}
                    </div>
                </div>
            </div>
        `
    }

    insertPlaylistToHTML(selector) {
        this.playlistContainer = this.$el.querySelector(".playlist-item-container")

        this.listVideoItems.forEach((videoItem)=>{
            this.playlistContainer.insertAdjacentHTML('beforeend', this.playlistItemHtml(videoItem.title, videoItem.channelTitle, videoItem.previewSrcMedium, videoItem.videoId))
        })

    }

    destroy() {
        this.videosPlaylistId = []
        this.lastVideoId = ""
        this.playlistId = ""
        this.listVideoItems = []
        document.querySelector("#videoPlayerModal").classList.remove("has-playlist")
        if(this.playlistContainer) {
            this.playlistContainer.innerHTML = ''
        }
    }
}
