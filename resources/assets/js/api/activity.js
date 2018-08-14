import { REGISTER_CONFIG } from "../config";

export default {
    getActivities: function () {
        return axios.get( REGISTER_CONFIG.API_URL  + '/activities' );
    }
}