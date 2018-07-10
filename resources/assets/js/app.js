
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import BootStrapApp from './BootStrapApp';
import router from './router';

import VueStripeCheckout from 'vue-stripe-checkout';

Vue.use(VueStripeCheckout, {
    key: window.YOUR_STRIPE_PUBLISHABLE_KEY,
    locale: 'auto',
    currency: 'USD',
    billingAddress: true,
    panelLabel: 'Subscribe {{amount}}'
});

const app = new Vue({
    router,
    components:{
        BootStrapApp
    }
}).$mount('#app');
