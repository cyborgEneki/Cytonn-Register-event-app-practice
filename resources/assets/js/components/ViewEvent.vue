<template>
    <div id="view-event">
        <button class="primary">New</button>
        <table class="hover unstriped">
            <thead>
            <tr>
                <th>Event Name</th>
                <th>Frequency</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Location</th>
                <th>Lead Start Date</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ event.name }}</td>
                <td>{{ event.frequency }}</td>
                <td>{{ event.start_date }}</td>
                <td>{{ event.start_time }}</td>
                <td>{{ event.location }}</td>
                <td>{{ event.lead_start_date }}</td>
            </tr>
            </tbody>

            <br/>
            <router-link class="button" v-bind:to="'/list-events'">Back to events</router-link>
        </table>


        <table class="hover unstriped">
            <thead>
            <tr>
                <th>Activity Name</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="activity in event.activities">
                <td>{{ activity.name }}</td>
                <td>
                    <button @click="goToEdit(event)" class="button warning">
                        Edit
                    </button>

                    <button @click="deleteActivity(event)" class="button alert">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="large-12 medium-12 small-12 cell">
            <router-link class="button" :to="{name:'AddActivity',query:{eventId:event.id}}">Add a new activity
            </router-link>
        </div>


    </div>
</template>

<script>
    export default {
        name: 'ViewEvent',

        data: function () {
            return {
                event: {
                    name: '',
                    frequency: '',
                    start_date: '',
                    start_time: '',
                    location: '',
                    lead_start_date: '',
                    activities: []
                }
            };
        },

        created: function () {
            let m = this;
            let id = this.$route.query.id;
            let uri = 'http://enekifinalproject.test/events/' + id;
            axios.get(uri).then((response) => {
                m.event = response.data;

            })
        },

        methods: {
            goToEdit: function (activity) {
                this.$router.push({name: "EditActivity", query: {id: activity.id}})
            },
            deleteActivity: function (activity) {






                let uri = 'http://enekifinalproject.test/activities/' + activity.activity_id;
                axios.delete(uri, this.event).then((response) => {
                    this.$router.push({name: 'ViewEvent'});
                }).catch((e) => {
                    // this.errorShow();
                });
                // this.$router.push({name: "DeleteActivity", query: {id: activity.id}})
            }
        }
    }
</script>