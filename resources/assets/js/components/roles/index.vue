<script>

    import RoleView from './role'

    export default {
        name: "index",

        components: {RoleView},

        data() {
            return {
                roles: []
            }
        },

        methods: {
            getRoles() {
                let vm = this;
                axios.get('api/roles').then(response => {
                    vm.roles = response.data;
                })
            }
        },

        created() {
            this.getRoles();
        }
    }
</script>

<style scoped>

</style>