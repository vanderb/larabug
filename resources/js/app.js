
require('./bootstrap');

window.Vue = require('vue');

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas)



Vue.component('Editor', require('./components/Editor'));
Vue.component('FontAwesomeIcon', FontAwesomeIcon)

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

import Datepicker from 'vue-bulma-datepicker'

const app = new Vue({
    el: '#app',
    components: {
        vueDropzone: vue2Dropzone,
        Datepicker
    },
    data() {
        return {
            showDropzone: false,
            files: [],
            dropzoneOptions: {
                url: 'https://httpbin.org/post',
                maxFilesize: 0.5,
                headers: { "My-Awesome-Header": "header value" },
                createImageThumbnails: false,
            }
        }
    },
    methods: {
        handleAttachments(file) {
            this.files.push({
                name: file.name,
                size: file.size,
                type: file.type
            });
        },
        removeAttachment(file) {

        }
    }
});
