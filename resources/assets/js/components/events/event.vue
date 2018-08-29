<template>
    <tr>
        <td>{{eventRow}}</td>
        <td><a :href="url" v-text="data.name"></a></td>
        <td>{{data.frequency}}</td>
        <td>{{data.start_date}}</td>
    </tr>
</template>
<script>

    export default {
        props: ['data', 'row'],

        data() {
            return {
                url: "/events/" + this.data.id,

                eventRow: Number(this.row) + 1,
            }
        }
    }

</script>
<style>


</style>
