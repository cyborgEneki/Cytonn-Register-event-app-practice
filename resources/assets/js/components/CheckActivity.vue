<template>
    <div>
        <div @click="updatecheck(activity)">
            <el-checkbox v-model="activity.checked"></el-checkbox>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["activity"],
        data() {
            return {}
        },

        methods: {
            updatecheck: function (activity) {
                activity.checked = activity.checked === true ? 0 : 1;
                let uri = 'http://enekifinalproject.test/activities/' + activity.id;
                axios.put(uri, activity).then((response) => {

                }).catch((e) => {
                });
            }
        }
    }

</script>

<style>

</style>