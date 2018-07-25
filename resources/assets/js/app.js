window.Vue = require('vue');

window.VueRouter=require('vue-router').default;

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

let AppLayout = require('./components/App');

// Registering modules
Vue.use(VueRouter,VueAxios,Axios);


//list all the templates
const AddEvent = Vue.component('AddEvent', require('./components/AddEvent'));
const DeleteEvent = Vue.component('DeleteEvent', require('./components/DeleteEvent'));
const EditEvent = Vue.component('EditEvent', require('./components/EditEvent'));
const ListEvents = Vue.component('ListEvents', require('./components/ListEvents'));
const ViewEvent = Vue.component('ViewEvent', require('./components/ViewEvent'));

const routes = [
    {
        path: '/',
        name: 'ListEvents',
        component: ListEvents,
    },
    {
        path: '/add-event',
        name: 'AddEvent',
        component: AddEvent,
    },
    {
        path: '/delete-event',
        name: 'DeleteEvent',
        component: DeleteEvent,
    },
    {
        path: '/edit/:id',
        name: 'EditEvent',
        component: EditEvent,
    },
    {
        path: '/view/:id',
        name: 'ViewEvent',
        component: ViewEvent,
    }
]

const router = new VueRouter ({
    mode: "history",
    routes: routes
});

new Vue(
    Vue.util.extend(
        { router },
        AppLayout)
    ).$mount('#app');

// const app = new Vue({
//     el: '#app'
// });