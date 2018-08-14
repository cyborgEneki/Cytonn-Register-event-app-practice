import { REGISTER_CONFIG } from '../config';

export default {
    getEvents: function(){
        return axios.get( REGISTER_CONFIG.API_URL + '/events');
    },

    getEvent: function( eventID ){
        return axios.get( REGISTER_CONFIG.API_URL + '/events/' + eventID );
    },

    deleteEvent: function (eventID){
        return axios.delete( REGISTER_CONFIG.API_URL + '/events/' + eventID );
    },

    updateEvent: function ( eventID ){
        return axios.put( REGISTER_CONFIG.API_URL + '/events/' + eventID );
    },

    // postNewEvent: function( name, frequency, start_date, start_time, lead_start_date, location ){
    //     return axios.post( REGISTER_CONFIG.API_URL,
    //         // {
    //         //     name: name,
    //         //     frequency: frequency,
    //         //     start_date: start_date,
    //         //     start_time: start_time,
    //         //     lead_start_date: lead_start_date,
    //         //     location: location
    //         // }
    //     );
    // }


    postNewEvent:function (newEvent) {
        return axios.post(REGISTER_CONFIG.API_URL + '/events', newEvent)
    }
}