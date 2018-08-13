<template>
    <div id="delete-event">
        <h3>{{ event.name }}</h3>
        <form>
            <p>The action cannot be undone</p>
            <button class="button alert" type="submit" name="button" v-on:click.prevent="removeEvent">Delete Event</button>
            <router-link class="button primary" v-bind:to="'/list-events'">Back to Events</router-link>

        </form>
    </div>
</template>

<script>
    export default {
        name: "DeleteEvent",

        data: function () {
            return {
                event: {
                    name: '',
                    frequency: '',
                    start_date: '',
                    start_time: '',
                    lead_start_date: '',
                    location: ''
                }
            };
        },


        created: function () {
            let m = this;
            let id = this.$route.query.id;

            // console.log('id delete event',id);
            let uri = 'http://enekifinalproject.test/events/' + id;
            axios.get(uri).then((response) => {
                m.event = response.data;
            })
        },

        methods: {
            removeEvent: function() {
                let uri = 'http://enekifinalproject.test/events/' + this.$route.query.id;
                axios.delete(uri, this.event).then((response) => {
                    this.$router.push({name: 'ListEvents'});
                });
            }
        }
    }
</script>