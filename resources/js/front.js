window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import Vue from 'vue'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import AOS from 'aos';
import 'aos/dist/aos.css'; 
AOS.init();

import App from './views/App';
import VueAgile from 'vue-agile'

Vue.use(VueAgile)
import router from './router.js';
const app = new Vue({
	el: '#root',
	render: h => h(App),
	router
});

