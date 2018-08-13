import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use( VueRouter )

setTimeout(()=>{

},0);
export default new VueRouter({

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
                    path: '/view/:id',
                    name: 'ViewEvent',
                    component: Vue.component( 'ViewEvent', require( './components/ViewEvent' ) )
                },
                {
                    path: '/activities',
                    name: 'ViewActivity',
                    component: Vue.component( 'ViewEvent', require( './components/ViewEvent' ) )
                }
            ]
        }
    ]
});