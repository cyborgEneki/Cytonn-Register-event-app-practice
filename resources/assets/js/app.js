require('./bootstrap');

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

import Vue from 'vue'
import router from './routes.js'
import store from './store.js'
import ElementUI from  'element-ui'
import VueRouter from 'vue-router'

require('./components')

// Registering modules
Vue.use(VueRouter,VueAxios,Axios);
Vue.use(ElementUI);

export const app = new Vue({
    router,
    ElementUI,
    store
}).$mount('#app');