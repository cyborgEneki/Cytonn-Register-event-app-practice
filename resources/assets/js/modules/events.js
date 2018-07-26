import EventAPI from '../api/event';

export const events =
    {
        state:
            {
                events: [],
                eventsLoadStatus: 0,

                event: {},
                eventLoadStatus: 0,

                eventAddStatus: 0
            },

        actions:
            {
                loadEvents({commit}) {
                    commit('setEventsLoadStatus', 1);

                    EventAPI.getEvents()
                        .then(function (response) {
                            commit('setEvents', response.data);
                            commit('setEventsLoadStatus', 2);
                        })
                        .catch(function () {
                            commit('setEvents', []);
                            commit('setEventsLoadStatus', 3);
                        });
                },
                loadEvent({commit}, data) {
                    commit('setEventLoadStatus', 1);

                    EventAPI.getEvent(data.id)
                        .then(function (response) {
                            commit('setEvent', response.data);
                            commit('setEventLoadStatus', 2);
                        })
                        .catch(function () {
                            commit('setEvent', {});
                            commit('setEventLoadStatus', 3);
                        });
                },
                addEvent({commit, state, dispatch}, data) {
                    commit('setEventAddedStatus', 1);
                    EventAPI.postNewEvent(data.name, data.frequency, data.start_date_and_time, data.lead_start_date, data.lead_duration)
                        .then(function (response) {
                            commit('setEventAddedStatus', 2);
                            dispatch('loadEvents');
                        })
                        .catch(function () {
                            commit('setEventAddedStatus', 3);
                        });
                },
            },

        mutations:
            {
                setEventsLoadStatus(state, status) {
                    state.eventsLoadStatus = status;
                },

                setEvents(state, events) {
                    state.events = events;
                },

                setEventLoadStatus(state, status) {
                    state.eventLoadStatus = status;
                },

                setEvent(state, event) {
                    state.event = event;
                },
                setEventAddedStatus(state, status) {
                    state.eventAddStatus = status;
                }
            },

        getters:
            {
                getEventsLoadStatus(state) {
                    return state.eventsLoadStatus;
                },

                getEvents(state) {
                    return state.events;
                },

                getEventLoadStatus(state) {
                    return state.eventLoadStatus;
                },

                getEvent(state) {
                    return state.event;
                },
                getEventAddStatus(state) {
                    return state.eventAddStatus;
                }
            }

    }