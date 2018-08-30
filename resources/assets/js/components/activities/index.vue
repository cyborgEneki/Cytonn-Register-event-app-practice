<script>

    import ActivityView from "./activity"

    export default {
        components: {ActivityView},

        data() {
            return {
                activities: [],
            }
        },

        methods: {
            getActivities() {
                let vm = this;
                axios.get("/api/activities").then(response => {
                    vm.activities = response.data;
                })
            }
        },

        created() {
            this.getActivities();
        }
    }
</script>

<style scoped>

</style>

