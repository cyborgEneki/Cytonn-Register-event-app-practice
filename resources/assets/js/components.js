import Vue from 'vue'

Vue.component( 'ListEvents', require( './components/ListEvents' ) );
Vue.component( 'ListActivities', require( './components/ListActivities' ) );
Vue.component('ActivityActive', require('./components/activity_user') );
Vue.component('IndexEvents', require('./components/events/index') );
Vue.component('IndexActivities', require('./components/activities/index') );
Vue.component('IndexRoles', require('./components/roles/index') );
