import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use( VueRouter )

let routers= new VueRouter({

    mode:'history',
    // history: true,
    routes: [
        {
            path: '/',
            name: 'layout',
            component: Vue.component( 'Layout', require( './components/Layout' ) ),
            children: [
                {
                    path: '/list-events',
                    name: 'ListEvents',
                    component: Vue.component( 'ListEvents', require( './components/ListEvents' ) )
                },
                {
                    path: '/add-event',
                    name: 'AddEvent',
                    component: Vue.component( 'AddEvent', require( './components/AddEvent' ) )
                },
                {
                    path: '/delete-event/:id',
                    name: 'DeleteEvent',
                    component: Vue.component( 'DeleteEvent', require( './components/DeleteEvent' ) )
                },
                {
                    path: '/edit/:id',
                    name: 'EditEvent',
                    component: Vue.component( 'EditEvent', require( './components/EditEvent' ) )
                },
                {
                    path: '/view',
                    name: 'ViewEvent',
                    component: Vue.component( 'ViewEvent', require( './components/ViewEvent' ) )
                },
                {
                    path: '/add-activity',
                    name: 'AddActivity',
                    component: Vue.component( 'AddActivity', require( './components/AddActivity' ) )
                },
                {
                    path: '/edit-activity/:id',
                    name: 'EditActivity',
                    component: Vue.component( 'EditActivity', require( './components/EditActivity' ) )
                },
                {
                    path: '/delete-activity/:id',
                    name: 'DeleteActivity',
                    component: Vue.component( 'DeleteActivity', require( './components/DeleteActivity' ) )
                }
            ]
        }
    ]
});
setTimeout(() => {
    console.log(routers.currentRoute.path);
}, 0);
export default routers;