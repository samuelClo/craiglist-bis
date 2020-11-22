require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
import axios from 'axios'

import App from './views/App'
import City from './views/Screen/City'
import Home from './views/Screen/Home'
import Category from './views/Screen/Category'
import SubCategory from './views/Screen/SubCategory'
import Article from './views/Screen/Article'

Vue.use(VueRouter)
Vue.prototype.$axios = axios
Vue.prototype.$QRious= QRious

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                title: 'Accueil'
            }
        },
        {
            path: '/:city',
            name: 'city',
            component: City,
        },
        {
            path: '/:city/:category',
            name: 'category',
            component: Category,
        },
        {
            path: '/:city/:category/:subCategory',
            name: 'subCategory',
            component: SubCategory,
        },
        {
            path: '/:city/:category/:subCategory/:article',
            name: 'articleWithSub',
            component: Article,
        },
        {
            path: '/:city/:category/:article',
            name: 'article',
            component: Article,
        },
        {
            path: '*',
            redirect: '/'
        }
    ]
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    // store
});