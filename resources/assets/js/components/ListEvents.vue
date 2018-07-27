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
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Location</th>
                <th>Lead Date</th>
                <th>Lead Duration</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(event, index) in filteredEvents">
                <td>{{ index + 1 }}</td>
                <td>{{ event.name }}</td>
                <td>{{ event.frequency }}</td>
                <td>{{ event.start_date }}</td>
                <td>{{ event.start_time }}</td>
                <td>{{ event.location }}</td>
                <td>{{ event.lead_start_date }}</td>
                <td>
                    <router-link class="button primary" v-bind:to="{name: 'ViewEvent', params: {id: event.id}}">Show
                    </router-link>
                    <router-link class="button warning" v-bind:to="{name: 'EditEvent', params: {id: event.id}}">Edit
                    </router-link>
                    <button class="button alert delete"><a v-on:click="removeEvent">Delete</a></button>
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
        },

        methods: {
            removeEvent: function (index) {
                this.events.splice(index, 1);
            }
        }
    }
</script>

<style>
    .delete {
        color: #000;
    }
</style>