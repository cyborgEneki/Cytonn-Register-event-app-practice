import { REGISTER_CONFIG } from '../config';

export default {
    getEvents: function(){
        return axios.get( REGISTER_CONFIG.API_URL + '/events');
    },

    getEvent: function( eventID ){
        return axios.get( REGISTER_CONFIG.API_URL + '/events/' + eventID );
    },

    postNewEvent:function (newEvent) {
        return axios.post(REGISTER_CONFIG.API_URL + '/events', newEvent);
    }
}