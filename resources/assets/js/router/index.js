import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComponent from '../components/HomeComponent';
import NotFoundComponent from '../components/NotFoundComponent';

const routes = [
    {
        default: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        path: '/not-found',
        component: NotFoundComponent
    },
    {
        path: '*', redirect: '/not-found'
    }
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;