import { REGISTER_CONFIG } from "../config";

export default {
    getActivities: function () {
        return axios.get( REGISTER_CONFIG.API_URL  + '/activities' );
    },

    getActivity: function( activityID ){
        return axios.get( REGISTER_CONFIG.API_URL + '/activities/' + eventID );
    },

    postNewActivity:function (newActivity) {
        return axios.post(REGISTER_CONFIG.API_URL + '/activities', newActivity);
    }
}