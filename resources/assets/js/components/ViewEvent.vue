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
                    lead_start_date: ''
                }
            };
        },

        created: function () {
            let m = this;
            let id = this.$route.query.id;

            // console.log('id view event',id);
            let uri = 'http://enekifinalproject.test/events/' + id;
            axios.get(uri).then((response) => {
                m.event = response.data;
            })
        }
    }
</script>