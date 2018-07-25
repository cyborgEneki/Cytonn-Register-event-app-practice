<template>
    <div id="app-layout">
        <navigation></navigation>
        <router-view></router-view>
    </div>
</template>

<script>
    import Navigation from '../components/Navigation';

    export default {
        name:"Layout",
        components: {
            Navigation
        },

        created(){
            this.$store.dispatch( 'loadEvents' );
        }
    }
</script>

<style>

</style>