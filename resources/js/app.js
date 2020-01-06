// require('./bootstrap');

// window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('player-component', require('./components/PlayerComponent.vue').default);

// const app = new Vue({
    //     el: '#app',
    // });

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.component('paginate', require('vuejs-paginate'));

import App from './views/App'
import Cams from './views/Cams'
import Home from './views/Home'
import Players from './components/PlayerComponent'
import List from './views/PlayerList'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/cams',
            name: 'cams',
            component: Cams,
        },
        {
            path: '/pcs',
            name: 'list',
            component: List,
        },
        {
            path: '/pc',
            name: 'players',
            component: Players,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
