import VueRouter from 'vue-router'
import ShortenerIndex from "./components/shortener/Index";

const router = new VueRouter({
    routes: [
        {
            path: '/shortener',
            name: 'shortener',
            component: ShortenerIndex,
        },
    ],
    mode: 'history',
})

export default router
