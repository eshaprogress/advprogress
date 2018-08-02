import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import LayoutCalculator from '../LayoutCalculator';
import HomeComponent from '../components/HomeComponent';
import HomeMobileComponent from '../components/mobile/HomeMobileComponent';
import SubscribeComponent from '../components/SubscribeComponent';
import SubscribeMobileComponent from '../components/mobile/SubscribeMobileComponent';
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
import OurStoryComponent from '../components/OurStoryComponent';
import OurStoryMobileComponent from '../components/mobile/OurStoryMobileComponent';
import ProjectsComponent from '../components/ProjectsComponent';
import ProjectsMobileComponent from '../components/mobile/ProjectsMobileComponent';

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
                path: 'subscribe',
                components:{
                    standard:SubscribeComponent,
                    mobile:SubscribeMobileComponent,
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
                path: 'our-story',
                components:{
                    standard:OurStoryComponent,
                    mobile:OurStoryMobileComponent,
                }
            },
            {
                path: 'projects',
                components:{
                    standard:ProjectsComponent,
                    mobile:ProjectsMobileComponent,
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