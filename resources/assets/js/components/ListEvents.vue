<template>
    <div id="list-events">
        <span v-show="eventsLoadStatus == 1">Loading</span>
        <span v-show="eventsLoadStatus == 2">Events loaded successfully!</span>
        <span v-show="eventsLoadStatus == 3">Events loaded unsuccessfully!</span>

        <table class="hover unstriped">
            <thead>
            <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Frequency</th>
                <th>Start Date and Time</th>
                <th>Lead Date</th>
                <th>Lead Duration</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(event, index) in filteredEvents">
                <td>{{ index + 1 }}</td>
                <td>{{ event.name }}</td>
                <td>{{ event.frequency }}</td>
                <td>{{ event.start_date_and_time }}</td>
                <td>{{ event.lead_start_date }}</td>
                <td>{{ event.lead_duration }}</td>
                <td>
                    <router-link class="button primary" v-bind:to="{name: 'ViewEvent', params: {id: event.id}}">Show
                    </router-link>
                    <router-link class="button warning" v-bind:to="{name: 'EditEvent', params: {id: event.id}}">Edit
                    </router-link>
                    <router-link class="button alert" v-bind:to="{name: 'DeleteEvent', params: {id: event.id}}">Delete
                    </router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        created() {
            this.$store.dispatch('loadEvents');
        },

        computed: {
            eventsLoadStatus() {
                return this.$store.getters.getEventsLoadStatus;
            },

            events() {
                return this.$store.getters.getEvents;
            },
            filteredEvents: function () {
                if (this.events.length) {
                    return this.events;
                }
            }
        }
    }
</script>
