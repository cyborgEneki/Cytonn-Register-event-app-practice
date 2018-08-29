<template>
    <el-checkbox v-model="activity_checked">
        <span v-if="activity_checked">
            Complete
        </span>
        <span v-else>
           Incomplete
        </span>
    </el-checkbox>
</template>

<script>
    export default {
        name: "activity_user",

        props: ['checked', 'id'],
        data:()=> ({
            activity_checked: this.checked
        }),
        watch: {
            activity_checked: {
                handler: function () {
                    let form = {
                        id: this.id,
                        checked: this.activity_checked
                    };


                }
            }
        }
    }
</script>

<style scoped>

</style>