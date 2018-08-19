<template>
    <div id="view-event">
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
                <th>Status</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            <tr v-for="activity in event.activities">
                <td>{{ activity.name }}</td>
                <td>
                    <checkActivity :activity="activity"></checkActivity>
                </td>

                <td>
                    <button @click="goToEdit(activity.id)" class="button warning">
                        Edit
                    </button>

                    <button @click="deleteActivity(activity.id)" class="button alert">
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
    import checkActivity from './CheckActivity'

    export default {
        components: {checkActivity},
        name: 'ViewEvent',

        data: function () {
            return {
                check: false,
                event: {
                    name: '',
                    frequency: '',
                    start_date: '',
                    start_time: '',
                    location: '',
                    lead_start_date: '',
                    activities: [],
                }
            };
        },

        created: function () {
            let m = this;
            let id = this.$route.query.id;
            let uri = 'http://enekifinalproject.test/events/' + id;
            axios.get(uri).then((response) => {

                m.event = response.data;
                this.getChecked(m.event);
            });


        },

        methods: {
            goToEdit: function (activity) {
                this.$router.push({name: "EditActivity", query: {id: activity}})
            },
            deleteActivity: function (activity) {
                let vm = this;
                let uri = 'http://enekifinalproject.test/activities/' + activity;
                axios.delete(uri, this.event).then((response) => {
                    vm.$router.go()
                }).catch((e) => {
                    this.errorShow();
                });
            },

            errorShow() {

                alert('Oopsie! Sorry but you are not allowed to perform this action. ' +
                    'Log in with an admin account to delete an activity.', 'Title', {
                    confirmButtonText: 'OK',
                    callback: action => {
                        this.$message({
                            type: 'info',
                            message: `action: ${ action }`
                        });
                    }
                });
            },

            getChecked: function (event) {
                if (event.activities[0].checked === 1) {
                    this.check = true;
                } else if (event.activities[0].checked === 0) {
                    this.check = false;
                }
            }
        }
    }
</script>