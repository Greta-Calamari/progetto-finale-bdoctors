import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import DoctorsComponent from './pages/DoctorsComponent';
import CiaoComponent from './pages/CiaoComponent';
import SpecializationComponent from './pages/SpecializationComponent';


const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/',
            name:'home',
            component: HomeComponent
        },
        {
            path: '/doctors',
            name:'doctors',
            component: DoctorsComponent
        },
        {
            path: '/ciao',
            name:'ciao',
            component: CiaoComponent
        },
        {
            path: '/specializations/:id',
            name:'specialization',
            component: SpecializationComponent
        },


    ]
});
export default router;
