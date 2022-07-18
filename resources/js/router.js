import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import DoctorsComponent from './pages/DoctorsComponent';
import CiaoComponent from './pages/CiaoComponent';
import DoctorComponent from './pages/DoctorComponent';
import NotFoundComponent from './pages/NotFoundComponent';
import SpecializationComponent from './pages/SpecializationComponent';


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
            path: '/hello',

            name: 'hello',
            component: HelloComponent
        },
        {
            path: '/ciao',
            name: 'ciao',
            component: CiaoComponent
        },
        {
            path: '/doctors/:id',
            name: 'doctor',
            component: DoctorComponent

        },
        {
            path: '*',
            name: 'page-404',
            component: NotFoundComponent,
            path: '/specializations/:id',
            name: 'specialization',
            component: SpecializationComponent
        },


    ]
});
export default router;