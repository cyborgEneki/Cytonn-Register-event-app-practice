<template>
    <div id="delete-event">
        <h3>{{ event.name }}</h3>
        <form v-on:submit.prevent = 'deleteEvent'>
            <p>The action cannot be undone</p>
            <!--<button type="submit" class="button alert" name="button">Delete Event</button>-->
            <a class="button alert" v-on:click="removeEvent">Delete Event</a>
            <router-link class="button primary" v-bind:to="'list-events'">Back to Events</router-link>

        </form>
    </div>
</template>

<script>
    export default {
        name:"DeleteEvent",

        data: function()
        {
            return { event: {name: '', frequency: '', start_date: '', start_time: '', location: '', lead_start_date: ''} };
        },

        created: function()
        {
            let uri = 'http://enekifinalproject.test/events' + this.$route.params.id + '/edit';
            Axios.get(uri).then((response) => {
                this.event = response.data;
            });
        },

        methods: {
            removeEvent: function (index) {
                this.events.splice(index, 1);
            }
        }
    }
</script>