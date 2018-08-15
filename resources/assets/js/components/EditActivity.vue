<template>
    <div class="container" id="edit-activity">
        <h3>Edit Activity</h3>
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Activity Name
                            <input type="text" placeholder="Activity name" v-model="activity.name">
                        </label>
                        <div class="large-12 medium-12 small-12 cell">
                            <button type="submit" class="button warning" v-on:click.prevent="updateActivity">Update Activity
                            </button>
                            <router-link class="button" v-bind:to="'/list-events'">Cancel</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    export default {

        name: "EditActivity",

        data: function () {
            return {
                activity: {
                    name: '',


                }

            };
        },

        created(){
            let m = this;
            let id = this.$route.query.id;
            let uri = 'http://enekifinalproject.test/activities/' + id;
            axios.get(uri).then((response) => {
                m.activity = response.data;
            })
        },

        methods: {
            updateActivity: function () {
                let uri = 'http://enekifinalproject.test/activities/' + this.$route.query.id;
                axios.put(uri, this.activity,).then((response) => {
                    this.$router.go(-1);
                }).catch((e) => {
                    this.errorShow();
                });
            },

            errorShow() {

                alert('Oopsie! Sorry but you are not allowed to perform this action. ' +
                    'Log in with an admin account to edit an activity.', 'Title', {
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