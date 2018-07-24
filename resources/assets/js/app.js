window.Vue = require('vue');

window.VueRouter=require('vue-router').default;

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

Vue.use(VueRouter,VueAxios,axios);

Vue.component('example-component', require('./components/App'));

// const app = new Vue({
//     el: '#app'
// });

const router = new VueRouter ({
    mode: "history",
    routes: routes
});

new Vue(
    Vue.util.extend(
        {router},
        AppLayout)
    ).$mount(#app);