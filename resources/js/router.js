import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import DoctorsComponent from './pages/DoctorsComponent';
import CiaoComponent from './pages/CiaoComponent';


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
    ]
});
export default router;
