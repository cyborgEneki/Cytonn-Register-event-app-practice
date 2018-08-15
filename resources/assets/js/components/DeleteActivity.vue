<template>
    <div id="delete-activity">
        <h3>{{ activity.name }}</h3>
        <form>
            <p>The action cannot be undone</p>
            <button class="button alert" type="submit" name="button" v-on:click.prevent="removeActivity">Delete Activity
            </button>
            <router-link class="button primary" v-bind:to="'/list-events'">Back to Events</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        name: "DeleteActivity",

        data: function () {
            return {
                activity: {
                    name: '',
                }
            };
        },


        created: function () {
            let m = this;
            let id = this.$route.query.id;
            let uri = 'http://enekifinalproject.test/activities/' + id;
            axios.get(uri).then((response) => {
                m.activity = response.data;
            })
        },

        methods: {
            removeEvent: function () {
                let uri = 'http://enekifinalproject.test/activity/' + this.$route.query.id;
                axios.delete(uri, this.event).then((response) => {
                    this.$router.push({name: 'ViewEvent'});
                }).catch((e) => {
                    this.errorShow();
                });
            },

            errorShow() {

                alert('Oopsie! Sorry but you are not allowed to perform this action. ' +
                    'Log in with an admin account to delete an activity.', 'Title', {
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