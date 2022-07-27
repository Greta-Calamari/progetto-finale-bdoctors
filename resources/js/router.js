import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);


import HomeComponent from './pages/HomeComponent';
import DoctorsComponent from './pages/DoctorsComponent';
import DoctorComponent from './pages/DoctorComponent';
import NotFoundComponent from './pages/NotFoundComponent';
import ChiSiamoComponent from './pages/ChiSiamoComponent';
import PrivacyComponent from './pages/PrivacyComponent';
import PrestazioniComponent from './pages/PrestazioniComponent';


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/doctors',
            name: 'doctors',
            component: DoctorsComponent
        },
        {
            path: '/doctors/:slug',
            name: 'doctor',
            component: DoctorComponent
        },
        {
            path: '/chisiamo',
            name: 'chisiamo',
            component: ChiSiamoComponent,
        },
        {
            path: '/privacy',
            name: 'privacy',
            component: PrivacyComponent,
        },
        {
            path: '/prestazioni',
            name: 'prestazioni',
            component: PrestazioniComponent,
        },
        {
            path: '*',
            name: 'page-404',
            component: NotFoundComponent,
        },
    ]
});
export default router;