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
                <label>Start Date</label>
                <input v-model="event.start_date" class="form" required />
            </div>
            <div class="form">
                <label>Start Time</label>
                <input v-model="event.start_time" class="form" required />
            </div>
            <div class="form">
                <label for="edit-lead-start">Lead Date</label>
                <input id="edit-lead-start" v-model="event.lead_start_date" class="form" required />
            </div>
            <div class="form">
                <label>Location</label>
                <input v-model="event.location" class="form" required />
            </div>

            <button type="submit" class="button">Update Event</button>
            <router-link class="button warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default{
        name: "EditEvent",

        data: function()
        {
            return { event: {name: '', frequency: '', start_date: '', start_time: '',location: '', lead_start_date: ''} };
        },

        created: function()
        {
            let uri = 'http://enekifinalproject.test/events' + '/' + this.$route.params.id + '/edit';
            Axios.get(uri).then((response) => {
                this.event = response.data;
            });
        },

        methods: {
            updateEvent: function()
            {
                let uri = 'http://enekifinalproject.test/events'+ this.$route.params.id;
                Axios.patch(uri, this.event).then((response) => {
                    this.$router.push({name: 'ListEvents'})
                })
            },
        }
    }
</script>