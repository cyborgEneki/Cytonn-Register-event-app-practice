<template>
    <tr>
        <td>{{roleRow}}</td>
        <td><a :href="url" v-text="data.name"></a></td>
        <td>{{data.display_name}}</td>
        <td>{{data.description}}</td>
    </tr>
</template>

<script>
    export default {
        name: "role",

        props: ['data', 'row'],

        data() {
            return {
                url: '/roles/' + this.data.id,

                roleRow: Number(this.row) + 1,
            }
        }
    }
</script>

<style scoped>

</style>