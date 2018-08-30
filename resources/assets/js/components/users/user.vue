<template>
    <tr>
        <td>{{ userRow }}</td>
        <td><a :href="url" v-text="data.name"></a></td>
        <td>{{data.email}}</td>
        <td>
            <p v-for="role in data.roles">{{role.name}}</p>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "user",

        props: ['data', 'row'],

        data() {
            return {
                url: '/users/' + this.data.id,

                userRow: Number(this.row) + 1,
            }
        }
    }
</script>

<style scoped>

</style>