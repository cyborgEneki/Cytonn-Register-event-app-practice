<template>
    <div @click="setChecked">
    <el-checkbox v-model="activity_checked" :checked="activity_checked">
        <span>
       {{activityMessage}}
        </span>
    </el-checkbox>
   </div>
</template>

<script>
    export default {
        name: "activity_user",

        props: ['ischecked', 'id', 'event_id'],

        data() {
          return{
              activity_checked: this.ischecked==1?true:false,

          }
        },

        methods: {
            setChecked() {
                let newStatus = (!this.activity_checked)==true?1:0;
                console.log(newStatus);
                axios.patch('/api/activities/'+this.event_id+'/'+this.id+'/check/'+newStatus).then(response => {
                    
                })
            }
        },

        computed:{
            activityMessage(){
                return this.activity_checked==1?"Approved":"Pending";
            }
        }
    }
</script>

<style scoped>

</style>