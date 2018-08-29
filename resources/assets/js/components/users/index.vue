<script>

    import UserView from './user'

    export default {
        name: "index",

        components: {UserView},

        data() {
            return {
                users: []
            }
        },

        methods: {
            getUsers() {
                let vm = this;
                axios.get('/api/users').then(response => {
                    vm.users = response.data.data;
                })
            }
        },

        created() {
            this.getUsers();
        }
    }
</script>

<style scoped>

</style>