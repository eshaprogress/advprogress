
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import BootStrapApp from './BootStrapApp';
import router from './router';
import VueMq from 'vue-mq'
Vue.use(VueMq, {
    breakpoints: { // default breakpoints - customize this
        m_tiny: 500,
        m_small: 600,
        m_bigger: 9000,
        tablet: 1160,
        standard: Infinity,
    }
});

const app = new Vue({
    router,
    components:{
        BootStrapApp
    },
    render(h){return h(BootStrapApp)}
}).$mount('#app');
