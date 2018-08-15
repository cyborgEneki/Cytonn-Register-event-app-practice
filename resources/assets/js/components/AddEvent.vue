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
                        <label>Start Date
                            <input type="date" placeholder="Start Date" v-model="start_date">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Start Time
                            <input type="time" placeholder="Start Time" v-model="start_time">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Lead Date
                            <input type="date" placeholder="Lead Date" v-model="lead_start_date">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Location
                            <input type="text" placeholder="Location" v-model="location">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <a class="button" v-on:click="submitNewEvent">Add Event</a>
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
                start_date: '',
                start_time: '',
                lead_start_date: '',
                location: ''
            }
        },

        methods: {
            submitNewEvent: function () {
                this.$store.dispatch('addEvent', {
                    name: this.name,
                    frequency: this.frequency,
                    start_date: this.start_date,
                    start_time: this.start_time,
                    lead_start_date: this.lead_start_date,
                    location: this.location
                });
            }
        }
    }
</script>

<style lang="scss">
    @import '../../sass/components/validations';

</style>