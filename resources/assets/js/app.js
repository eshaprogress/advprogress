
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import BootStrapApp from './BootStrapApp';
import router from './router';
import store from './store';

import VueMq from 'vue-mq'
Vue.use(VueMq, {
    breakpoints: { // default breakpoints - customize this
        mobile: 1150,
        standard: Infinity,
    }
});

const app = new Vue({
    router,
    store,
    components:{
        BootStrapApp
    },
    render(h){return h(BootStrapApp)}
}).$mount('#app');
