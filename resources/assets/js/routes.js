import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use( VueRouter )

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'layout',
            component: Vue.component( 'Layout', require( './components/Layout' ) ),
            children: [
                {
                    path: '/home',
                    name: 'ListEvents',
                    component: Vue.component( 'ListEvents', require( './components/ListEvents' ) )
                },
                {
                    path: '/add-event',
                    name: 'AddEvent',
                    component: Vue.component( 'AddEvent', require( './components/AddEvent' ) )
                },
                {
                    path: '/delete-event',
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
                }
            ]
        }
    ]
});