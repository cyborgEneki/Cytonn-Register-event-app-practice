<template>
    <div class="page">
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Event Name
                            <input type="text" placeholder="Event name" v-model="name">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Frequency
                            <input type="text" placeholder="Frequency" v-model="frequency">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Start Date and Time
                            <input type="text" placeholder="Start Date and Time" v-model="start_date_and_time">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Lead Date
                            <input type="text" placeholder="Lead Date" v-model="lead_start_date">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Lead Duration
                            <input type="text" placeholder="Lead Duration" v-model="lead_duration">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <a class="button" v-on:click="submitNewEvent()">Add Event</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                frequency: '',
                start_date_and_time: '',
                lead_start_date: '',
                lead_duration: ''
            }
        },

        methods: {
            submitNewEvent(){
                this.$store.dispatch( 'addEvent', {
                    name: this.name,
                    frequency: this.frequency,
                    start_date_and_time: this.start_date_and_time,
                    lead_start_date: this.lead_start_date,
                    lead_duration: this.lead_duration
                });
            }
        },


    }


</script>


<!--<template>-->
<!--<div class="container" id="add-event">-->
<!--<h3>Add New Event</h3>-->
<!--<form v-on:submit.prevent = 'createEvent'>-->
<!--<div class="form">-->
<!--<label for="add-name">Event Name</label>-->
<!--<input id="add-name" v-model="event.name" class="form" required />-->
<!--</div>-->
<!--<div class="form">-->
<!--<label for="add-frequency">Frequency</label>-->
<!--<input id="add-frequency" v-model="event.frequency" class="form" required />-->
<!--</div>-->
<!--<div class="form">-->
<!--<label for="add-event-start">Start Date and Time</label>-->
<!--<input id="add-event-start" v-model="event.start_date_and_time" class="form" required />-->
<!--</div>-->
<!--<div class="form">-->
<!--<label for="add-lead-start">Lead Date</label>-->
<!--<input id="add-lead-start" v-model="event.lead_start_date" class="form" required />-->
<!--</div>-->
<!--<div class="form">-->
<!--<label for="add-lead-duration">Lead Date</label>-->
<!--<input id="add-lead-duration" v-model="event.lead_duration" class="form" required />-->
<!--</div>-->

<!--<button type="submit" class="button">Create Event</button>-->
<!--<router-link class="button warning" v-bind:to="'/'">Cancel</router-link>-->
<!--</form>-->
<!--</div>-->
<!--</template>-->

<!--<script>-->
<!--export default {-->

<!--name:"AddEvent",-->

<!--data: function()-->
<!--{-->
<!--return { event: {name: '', frequency: '', start_date_and_time: '', lead_start_date: '', lead_duration: ''} };-->
<!--},-->

<!--methods: {-->
<!--createEvent: function()-->
<!--{-->
<!--let uri = 'http://enekifinalproject.test/events';-->
<!--Axios.post(uri, this.event).then((response) => {-->
<!--this.$router.push({name: 'ListEvents'})-->
<!--})-->
<!--},-->
<!--}-->
<!--}-->

<!--</script>-->
