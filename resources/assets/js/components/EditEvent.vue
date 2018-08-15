<template>
    <div class="container" id="edit-event">
        <h3>Edit Event</h3>
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Event Name
                            <input type="text" placeholder="Event name" v-model="event.name">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Frequency
                            <input type="text" placeholder="Frequency" v-model="event.frequency">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Start Date
                            <input type="date" placeholder="Start Date" v-model="event.start_date">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Start Time
                            <input type="time" placeholder="Start Time" v-model="event.start_time">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Lead Date
                            <input type="date" placeholder="Lead Date" v-model="event.lead_start_date">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Location
                            <input type="text" placeholder="Location" v-model="event.location">
                        </label>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <button type="submit" class="button warning" v-on:click.prevent="updateEvent">Update Event
                        </button>
                        <router-link class="button" v-bind:to="'/list-events'">Cancel</router-link>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "EditEvent",

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
            let uri = 'http://enekifinalproject.test/events/' + id;
            axios.get(uri).then((response) => {
                m.event = response.data;
            })
        },

        methods: {
            updateEvent: function () {
                let uri = 'http://enekifinalproject.test/events/' + this.$route.query.id;
                axios.put(uri, this.event,).then((response) => {
                    this.$router.push({name: 'ListEvents'})
                }).catch((e) => {
                    this.errorShow();
                });
            },

            errorShow() {

                alert('Oopsie! Sorry but you are not allowed to perform this action. ' +
                    'Log in with an admin account to edit an event.', 'Title', {
                    confirmButtonText: 'OK',
                    callback: action => {
                        this.$message({
                            type: 'info',
                            message: `action: ${ action }`
                        });
                    }
                });
            }
        }
    }
</script>