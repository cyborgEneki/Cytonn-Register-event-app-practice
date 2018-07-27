<template>
    <div id="view-event">
        <h3>{{ event.name }}</h3>
        <strong>Frequency: </strong>
        <div>
            {{ event.frequency }}
        </div>
        <strong>Start Date and Time: </strong>
        <div>
            {{ event.start_date_and_time }}
        </div>
        <strong>Lead Date: </strong>
        <div>
            {{ event.lead_start_date }}
        </div>
        <br/>
        <router-link v-bind:to="'/'">Back to events</router-link>
    </div>
</template>

<script>
    export default {
        name:'ViewEvent',

        data: function()
        {
            return { event: {name: '', frequency: '', start_date_and_time: '', lead_start_date: ''} };
        },

        created: function()
        {
            let uri = 'http://enekifinalproject.test/events'+this.$route.params.id;
            Axios.get(uri).then((response) => {
                this.event = response.data;
            });
        }
    }
</script>