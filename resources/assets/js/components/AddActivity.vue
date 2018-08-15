<template>
    <form>
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="large-12 medium-12 small-12 cell">
                    <label>Activity Name
                        <input type="text" placeholder="Activity name" v-model="activity.name">
                    </label>
                    <div class="large-12 medium-12 small-12 cell">
                        <a class="button" v-on:click="submitNewActivity">Add Activity</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    // import vSelect from './Select'

    export default {

        // components:{vSelect},
        name: "AddActivity",

        data() {
            return {
                activity:{
                    name: '',
                    event_id:''

                }


            }
        },

        methods: {
            submitNewActivity: function () {
                let vm = this;
                this.$store.dispatch('addActivity', this.activity).then(()=>{
                    vm.$router.go(-1);
                });
            }
        },

        created(){
            this.activity.event_id=this.$route.query.eventId;
        }
    }

</script>

<style scoped>

</style>