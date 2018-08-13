require('./bootstrap');

// window.Vue = require('vue');
//
// window.VueRouter=require('vue-router').default;
//
window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

import Vue from 'vue'
import router from './routes.js'
import store from './store.js'
import VueRouter from 'vue-router'

// Registering modules
Vue.use(VueRouter,VueAxios,Axios);

new Vue({
    router,
    store
}).$mount('#app');