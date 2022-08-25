
require('./bootstrap');


import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';

// componenti pagina
import PageHome from './pages/PageHome.vue';
import PageBlog from './pages/PageBlog.vue';
import PageAbout from './pages/PageAbout.vue';
import PageContacts from './pages/PageContacts.vue';
import PagePost from './pages/PagePost.vue';
import Page404 from './pages/Page404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome
    },
    {
        path: '/blog',
        name: 'blog',
        component: PageBlog
    },
    {
        path: '/about',
        name: 'about',
        component: PageAbout
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: PageContacts
    },
    {
        path: '/blog/:slug',
        name: 'post',
        component: PagePost,
        props: true,
    },
    {
        path: '*',
        name: 'page404',
        component: Page404
    }
]

const router = new VueRouter ({
    routes,
    mode: 'history'
});



const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});

