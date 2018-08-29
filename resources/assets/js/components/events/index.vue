<script>
    import EventView from "./event"

    export default {
        components:{EventView},
        // name: "index",

        data(){
            return{
                events:[],
            }
        },

        methods:{
            getEvents(){
                let vm = this;
                axios.get("/api/events").then(response=>{
                    vm.events = response.data;
                })
            }
        },

        created(){
           this.getEvents();
        }
    }
</script>

<style scoped>


</style>