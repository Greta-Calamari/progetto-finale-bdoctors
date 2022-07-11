import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import HelloComponent from './pages/HelloComponent';
import CiaoComponent from './pages/CiaoComponent';


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
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


    ]
});
export default router;