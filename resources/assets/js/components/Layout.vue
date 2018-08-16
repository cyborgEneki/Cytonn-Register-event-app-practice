<template>
    <div id="app-layout">
        <navigation></navigation>

        <router-view></router-view>
    </div>
</template>

<script>
    import Navigation from '../components/Navigation';

    export default {
        name:"layout",

        components: {
            Navigation
        }
    }
</script>