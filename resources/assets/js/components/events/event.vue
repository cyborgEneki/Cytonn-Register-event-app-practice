<template>
    <tr>
    <!--<td>{{index++}}</td>-->
    <td><a :href="url" v-text="data.name"></a></td>
    <td >{{data.frequency}}</td>
    <td>{{data.start_date}}</td>
    </tr>
</template>
<script>

    export default {
        props:["data"],
        data(){
            return{
                // event:{},
                url:"/events/"+this.data.id,
            }
        }
    }

</script>
<style>



</style>
