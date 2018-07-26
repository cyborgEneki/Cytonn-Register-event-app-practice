import { REGISTER_CONFIG } from '../config';

export default {
    getEvents: function(){
        return axios.get( REGISTER_CONFIG.API_URL );
    },

    getEvent: function( eventID ){
        return axios.get( REGISTER_CONFIG.API_URL + eventID );
    },

    postNewEvent: function( name, frequency, start_date_and_time, lead_start_date, lead_duration ){
        return axios.post( REGISTER_CONFIG.API_URL,
            {
                name: name,
                frequency: frequency,
                start_date_and_time: start_date_and_time,
                lead_start_date: lead_start_date,
                lead_duration: lead_duration
            }
        );
    }

}