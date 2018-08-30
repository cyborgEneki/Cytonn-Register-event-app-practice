<template>
    <tr>
        <td>{{activityRow}}</td>
        <td><a :href="url" v-text="data.name"></a></td>
        <td>{{data.description}}</td>
    </tr>
</template>

<script>

    export default {
        props: ['data', 'row'],
        data() {
            return {
                url: "/activities/" + this.data.id,

                activityRow: Number(this.row) + 1
            }
        }
    }
</script>

<style scoped>

</style>

