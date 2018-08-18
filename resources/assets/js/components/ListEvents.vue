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
                <th>Lead Start Date</th>
                <th>Actions</th>
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

                    <button @click="goToView(event)" class="button primary">
                        Show
                    </button>

                    <button @click="goToEdit(event)" class="button warning">
                        Edit
                    </button>

                    <button @click="goToDelete(event)" class="button alert">
                        Delete
                    </button>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data() {
            return {

            }
        },
        created() {
            this.$store.dispatch('loadEvents');
        },

        methods: {
            goToEdit: function (event) {
                this.$router.push({name: "EditEvent", query: {id: event.id}})
            },

            goToView: function (event) {
                this.$router.push({name: "ViewEvent", query: {id: event.id}})
            },

            goToDelete: function (event) {
                this.$router.push({name: "DeleteEvent", query: {id: event.id}})
            }
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