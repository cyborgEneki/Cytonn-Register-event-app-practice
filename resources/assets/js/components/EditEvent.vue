<template>
    <div class="container" id="edit-event">
        <h3>Edit Event</h3>
        <form v-on:submit.prevent = 'updateEvent'>
            <div class="form">
                <label for="edit-name">Event Name</label>
                <input id="edit-name" v-model="event.name" class="form" required />
            </div>
            <div class="form">
                <label for="edit-frequency">Frequency</label>
                <input id="edit-frequency" v-model="event.frequency" class="form" required />
            </div>
            <div class="form">
                <label for="edit-event-start">Start Date and Time</label>
                <input id="edit-event-start" v-model="event.start_date_and_time" class="form" required />
            </div>
            <div class="form">
                <label for="edit-lead-start">Lead Date</label>
                <input id="edit-lead-start" v-model="event.lead_start_date" class="form" required />
            </div>
            <div class="form">
                <label for="edit-lead-duration">Lead Duration</label>
                <input id="edit-lead-duration" v-model="event.lead_duration" class="form" required />
            </div>

            <button type="submit" class="button">Create Event</button>
            <router-link class="button warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default{
        name: "EditEvent",

        data: function()
        {
            return { event: {name: '', frequency: '', start_date_and_time: '', lead_start_date: '', lead_duration: ''} };
        },

        created: function()
        {
            let uri = 'http://enekifinalproject.test/events' + this.$route.params.id + '/edit';
            Axios.get(uri).then((response) => {
                this.event = response.data;
            });
        },

        methods: {
            createEvent: function()
            {
                let uri = 'http://enekifinalproject.test/events'+ this.$route.params.id;
                Axios.patch(uri, this.event).then((response) => {
                    this.$router.push({name: 'ListEvents'})
                })
            },
        }
    }
</script>