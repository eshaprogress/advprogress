import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import LayoutCalculator from '../LayoutCalculator';
import HomeComponent from '../components/HomeComponent';
import HomeMobileComponent from '../components/mobile/HomeMobileComponent';
import ConsultationComponent from '../components/ConsultationComponent';
import ConsultationMobileComponent from '../components/mobile/ConsultationMobileComponent';
import DonateComponent from '../components/DonateComponent';
import DonateMobileComponent from '../components/mobile/DonateMobileComponent';
import CancelSubscriptionComponent from '../components/CancelSubscriptionComponent';
import CancelSubscriptionMobileComponent from '../components/mobile/CancelSubscriptionMobileComponent';
import CancelSubscriptionConfirmedComponent from '../components/CancelSubscriptionConfirmedComponent';
import CancelSubscriptionConfirmedMobileComponent from '../components/mobile/CancelSubscriptionConfirmedMobileComponent';
import NotFoundComponent from '../components/NotFoundComponent';
import NotFoundMobileComponent from '../components/mobile/NotFoundMobileComponent';

const routes = [
    {
        default: 'home',
        path: '/',
        component: LayoutCalculator,
        children:[
            {
                path: '',
                components:{
                    standard:HomeComponent,
                    mobile:HomeMobileComponent,
                }
            },
            {
                path: 'donate',
                components:{
                    standard:DonateComponent,
                    mobile:DonateMobileComponent,
                }
            },
            {
                path: 'consultation',
                components:{
                    standard:ConsultationComponent,
                    mobile:ConsultationMobileComponent,
                }
            },
            {
                path: 'cancel-subscription/confirm',
                components:{
                    standard:CancelSubscriptionConfirmedComponent,
                    mobile:CancelSubscriptionConfirmedMobileComponent,
                }
            },
            {
                path: 'cancel-subscription',
                components:{
                    standard:CancelSubscriptionComponent,
                    mobile:CancelSubscriptionMobileComponent,
                }
            },
            {
                path: 'not-found',
                components:{
                    standard:NotFoundComponent,
                    mobile:NotFoundMobileComponent,
                }
            },
            {
                path: '*', redirect: '/not-found'
            }
        ]
    },

];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;