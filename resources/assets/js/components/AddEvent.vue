<template>
    <div class="container" id="add-event">
        <h3>Add New Event</h3>
        <form v-on:submit.prevent = 'createEvent'>
            <div class="form">
                <label for="add-name">Event Name</label>
                <input id="add-name" v-model="event.name" class="form" required />
            </div>
            <div class="form">
                <label for="add-frequency">Frequency</label>
                <input id="add-frequency" v-model="event.frequency" class="form" required />
            </div>
            <div class="form">
                <label for="add-event-start">Start Date and Time</label>
                <input id="add-event-start" v-model="event.start_date_and_time" class="form" required />
            </div>
            <div class="form">
                <label for="add-lead-start">Lead Date</label>
                <input id="add-lead-start" v-model="event.lead_start_date" class="form" required />
            </div>
            <div class="form">
                <label for="add-lead-duration">Lead Date</label>
                <input id="add-lead-duration" v-model="event.lead_duration" class="form" required />
            </div>

            <button type="submit" class="button">Create Event</button>
            <router-link class="button warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        name:"AddEvent",

        data: function()
        {
            return { event: {name: '', frequency: '', start_date_and_time: '', lead_start_date: '', lead_duration: ''} };
        },

        methods: {
            createEvent: function()
            {
                let uri = 'http://enekifinalproject.test/events';
                Axios.post(uri, this.event).then((response) => {
                    this.$router.push({name: 'ListEvents'})
                })
            },
        }
    }

</script>
