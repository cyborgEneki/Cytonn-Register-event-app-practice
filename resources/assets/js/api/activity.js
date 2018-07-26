import { REGISTER_CONFIG } from "../config";

export default {
    getActivities: function () {
        return axios.get( REGISTER_CONFIG.API_URL );
    },

    getActivity: function (activityID) {
        return axios.get( REGISTER_CONFIG.API_URL + 'activityID')
    },

    postNewActivity: function (name, description) {
        return axios.post( REGISTER_CONFIG.API_URL, {
            name: name,
            descripion: description
        } )
    }

}