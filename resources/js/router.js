import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);


import HomeComponent from './pages/HomeComponent';
import DoctorsComponent from './pages/DoctorsComponent';
import DoctorComponent from './pages/DoctorComponent';
import NotFoundComponent from './pages/NotFoundComponent';
import ChiSiamoComponent from './pages/ChiSiamoComponent';


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
            path: '*',
            name: 'page-404',
            component: NotFoundComponent,
        },
        {
            path: '/chisiamo',
            name: 'chisiamo',
            component: ChiSiamoComponent,
        },
    ]
});
export default router;