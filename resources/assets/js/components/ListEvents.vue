<template>
    <div class="container" id="list-events">
        <div class="clearfix">
            <div class="float-right">
                <router-link class="button" v-bind:to="{path:'/add-event'}">Add New Event</router-link>
                <br/>
            </div>
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
                            <router-link class="button primary" v-bind:to="{name: 'ViewEvent', params: {id: event.id}}">Show</router-link>
                            <router-link class="button warning" v-bind:to="{name: 'EditEvent', params: {id: event.id}}">Edit</router-link>
                            <router-link class="button alert" v-bind:to="{name: 'DeleteEvent', params: {id: event.id}}">Delete</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name:'ListEvents',

        data: function()
        {
            return { events: '' };
        },

        created: function()
        {
            let uri = 'http://enekifinalproject.test/events';
            Axios.get(uri).then((response) => {
                this.events = response.data;
            });
        },

        computed: {
            filteredEvents: function () {
                if(this.events.length) {
                    return this.events;
                }
            }
        }
    }
</script>
