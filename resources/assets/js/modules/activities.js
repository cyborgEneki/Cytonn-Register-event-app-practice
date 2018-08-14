import ActivityAPI from '../api/activity';

export const activities = {
    state: {
        activities: [],
        activitiesLoadStatus: 0,
    },

    actions: {
        loadActivities ( { commit } ){
            commit ('setActivitiesLoadStatus', 1 );

            ActivityAPI.getActivities().
                then (function (response)
            {
                commit('setActivities', response.data);
                commit('setActivitiesLoadStatus', 2);
            }).
                catch (function (){
                    commit('setActivities', [] );
                    commit('setActivitiesLoadStatus', 3 );
            });
        }
    },

    mutations: {
        setActivities(state, activities){
            state.activities = activities;
        },
        setActivitiesLoadStatus(state, status){
            state.activitiesLoadStatus = status;
        }
    },

    getters: {
        getActivities (state) {
            return state.activities;
        },
        getActivitiesLoadStatus (state) {
            return state.activitiesLoadStatus;
        }
    }
};