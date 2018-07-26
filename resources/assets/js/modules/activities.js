import ActivityAPI from '../api/activity';

export const activities = {
    state: {
        activities: [],
        activitiesLoadStatus: 0,

        activity: {},
        activityLoadStatus: 0
    },

    actions: {
        loadActivities ( { commit } ){
            commit ('setActivitiesLoadStatus', 1 );

            ActivityAPI.getActivities().
                then (function (response)
            {
                commit('setActivities', response.data);
                commit('setActivitesLoadStatus', 2);
            }).
                catch (function (){
                    commit('setActivities', [] );
                    commit('setActivitiesLoadStatus', 3 );
            });
        },

        loadActivity ( { commit }, data ){
            commit ('setActivityLoadStatus', 1 );

            ActivityAPI.getActivity(data.id).
                then (function (response) {
                commit('setActivity', response.data);
                commit('setActivity', 2);
            }).
                catch (function(){
                    commit ('setActivity', []);
                    commit('setActivity', 3);
            });
        }

    },

    mutations: {
        setActivities(state, activities){
            state.activities = activities;
        },
        setActivitesLoadStatus(state, status){
            state.activitiesLoadStatus = status;
        },
        setActivity(state, activity){
            state.activity = activity;
        },
        setActivityLoadStatus(state, status){
            state.activityLoadStatus = status;
        }
    },

    getters: {
        getActivities (state) {
            return state.activities;
        },
        getActivityLoadStatus (state) {
            return state.activityLoadStatus;
        },
        getActivity (state) {
            return state.activity;
        },
        getActivitiesLoadStatus (state) {
            return state.activitiesLoadStatus;
        }
    }
};