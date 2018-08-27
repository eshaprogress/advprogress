import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import LayoutCalculator from '../LayoutCalculator';
import HomeComponent from '../components/HomeComponent';
import HomeMobileComponent from '../components/mobile/HomeMobileComponent';
import SubscribeComponent from '../components/SubscribeComponent';
import VolunteerComponent from '../components/VolunteerComponent';
import VolunteerMobileComponent from '../components/mobile/VolunteerMobileComponent';
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
import DirectoryListLayoutComponent from '../components/directory/DirectoryListLayoutComponent';
import ProjectByCategoryComponent from '../components/directory/ProjectByCategoryComponent';
import ProjectByIdComponent from '../components/project/ProjectByIdComponent';
import ProjectIntroComponent from '../components/project/ProjectIntroComponent';
import ProjectStatusComponent from '../components/project/ProjectStatusComponent';
import ProjectProposedLegislationComponent from '../components/project/ProjectProposedLegislationComponent';
import ProjectCurrentLegislationComponent from '../components/project/ProjectCurrentLegislationComponent';

const routes = [
    {
        default: 'home',
        path: '/',
        component: LayoutCalculator,
        children:[
            {
                name: 'home-root',
                path: '',
                components:{
                    standard:HomeComponent,
                    mobile:HomeMobileComponent,
                }
            },
            {
                name: 'donate',
                path: 'donate',
                components:{
                    standard:DonateComponent,
                    mobile:DonateMobileComponent,
                }
            },
            {
                name: 'subscribe',
                path: 'subscribe',
                components:{
                    standard:SubscribeComponent,
                    mobile:SubscribeMobileComponent,
                }
            },
            {
                name: 'volunteer',
                path: 'volunteer',
                components:{
                    standard:VolunteerComponent,
                    mobile:VolunteerMobileComponent,
                }
            },
            {
                name: 'consultation',
                path: 'consultation',
                components:{
                    standard:ConsultationComponent,
                    mobile:ConsultationMobileComponent,
                }
            },
            {
                name: 'cancel-subscription-confirm',
                path: 'cancel-subscription/confirm',
                components:{
                    standard:CancelSubscriptionConfirmedComponent,
                    mobile:CancelSubscriptionConfirmedMobileComponent,
                }
            },
            {
                name: 'our-story',
                path: 'our-story',
                components:{
                    standard:OurStoryComponent,
                    mobile:OurStoryMobileComponent,
                }
            },
            {
                path: 'directory',
                components:{
                    standard:DirectoryListLayoutComponent,
                    mobile:DirectoryListLayoutComponent,
                },
                children:[
                    {
                        name: 'directory-root',
                        path: '',
                        components:{
                            standard:ProjectByCategoryComponent,
                            mobile:ProjectByCategoryComponent,
                        }
                    },
                    {
                        name: 'directory-category-id',
                        path: 'category/:categoryId',
                        components:{
                            standard:ProjectByCategoryComponent,
                            mobile:ProjectByCategoryComponent,
                        }
                    }
                ]
            },
            {
                name: 'project-id',
                path: 'project/:projectId',
                components:{
                    standard:ProjectByIdComponent,
                    mobile:ProjectByIdComponent,
                },
                children:[
                    {
                        name: 'project-intro',
                        path: 'intro',
                        components:{
                            standard:ProjectIntroComponent,
                            mobile:ProjectIntroComponent,
                        }
                    },
                    {
                        name: 'project-status',
                        path: 'status',
                        components:{
                            standard:ProjectStatusComponent,
                            mobile:ProjectStatusComponent,
                        }
                    },
                    {
                        name: 'project-current-legislation',
                        path: 'current-legislation',
                        components:{
                            standard:ProjectCurrentLegislationComponent,
                            mobile:ProjectCurrentLegislationComponent,
                        }
                    },
                    {
                        name: 'project-proposed-legislation',
                        path: 'proposed-legislation',
                        components:{
                            standard:ProjectProposedLegislationComponent,
                            mobile:ProjectProposedLegislationComponent,
                        }
                    }
                ]
            },
            {
                name: 'cancel-subscription',
                path: 'cancel-subscription',
                components:{
                    standard:CancelSubscriptionComponent,
                    mobile:CancelSubscriptionMobileComponent,
                }
            },
            {
                name:'not-found',
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
import VueScrollTo from 'vue-scrollto';

const router = new VueRouter({
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            VueScrollTo.scrollTo(to.hash, 700);
            return { selector: to.hash }
        } else if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 }
        }
    },
    mode: 'history',
    routes // short for `routes: routes`
});

export default router;