import ActivityAPI from '../api/activity';

export const activities = {
    state: {
        activities: [],

        activity: {}
    },

    actions: {
        loadActivities ( { commit } ){
            ActivityAPI.getActivities().then (function (response) {
                commit('setActivities', response.data);
            });
        },

        addActivity({commit, state, dispatch}, data) {
            ActivityAPI.postNewActivity(data).then(function (response) {
                    dispatch('loadActivities');
                });
        }
    },

    mutations: {
        setActivities(state, activities){state.activities = activities;},

        setActivity(state, activity) {state.activity = activity;}
    },

    getters: {
        getActivities (state) {return state.activities;},

        getActivity(state) {return state.activity;}
    }
};