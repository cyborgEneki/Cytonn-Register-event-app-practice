import Vue from 'vue'
import Vuex from 'vuex'

Vue.use( Vuex );
import { events } from './modules/events'

export default new Vuex.Store({
    modules: {
        events
    }
});