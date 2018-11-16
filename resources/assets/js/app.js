
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
import Chart from 'vue-bulma-chartjs';

import VueMq from 'vue-mq'
Vue.use(VueMq, {
    breakpoints: { // default breakpoints - customize this
        mobile: 1150,
        standard: Infinity,
    }
});
Vue.component('Chart',Chart);
import VueScrollTo from 'vue-scrollto';
Vue.use(VueScrollTo);

import Loader from './components/Loader';
Vue.component('Loader', Loader);

import ImgPlaceholder from './components/ImgPlaceholder';
Vue.component('ImgPlaceholder', ImgPlaceholder);


const app = new Vue({
    router,
    store,
    components:{
        BootStrapApp
    },
    render(h){return h(BootStrapApp)}
}).$mount('#app');
