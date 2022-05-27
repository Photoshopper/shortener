require('./bootstrap');

import axios from "axios";

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
import router from './router'
import App from './components/App'

Vue.use(VueRouter)

axios.interceptors.response.use(
    (response) => {
        if (response) {
            return Promise.resolve(response)
        } else {
            return Promise.reject(response)
        }
    },
    (error) => {
        alert(error.response.data.message);
        return Promise.reject(error.response)

    }
)

const app = new Vue({
    el: '#app',
    render: (h) => h(App),
    router,
})
