import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import HelloComponent from './pages/HelloComponent';
import CiaoComponent from './pages/CiaoComponent';
import DoctorComponent from './pages/DoctorComponent';


const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/',
            name:'home',
            component: HomeComponent
        },
        {
            path: '/hello',
            name:'hello',
            component: HelloComponent
        },
        {
            path: '/ciao',
            name:'ciao',
            component: CiaoComponent
        },
        {
            path: '/doctors/:id', //(2 ore per capire che al posto delle {id} va :id) deep hate!!! fuck laravel!!!!!
            name:'doctor',
            component: DoctorComponent

        },


    ]
});
export default router;
