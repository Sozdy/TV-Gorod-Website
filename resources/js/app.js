require('./bootstrap');
require('popper.js')

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


const app = new Vue({
    el: document.getElementById("app")
});

require('./video_player/index')
require('./staff_list_carousel')
require('./mobile_menu')
require('./up_btn')
require('./popper_share__more')
require('./staff_image_show')
require('./reactions')
require('./search_button')
require('./polls')
require('./date_picker')
require('./days_switcher')
require('./scale_iframe_add')
