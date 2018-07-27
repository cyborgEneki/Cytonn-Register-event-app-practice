<template>
    <nav class="top-navigation">

        <ul class="menu">
            <li>
                <router-link :to="{ name: 'ListEvents' }">
                    Events
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'AddEvent' }">
                    Add Event
                </router-link>
            </li>
        </ul>

    </nav>
</template>
<script>
    export default {

    }
</script>

<style lang="scss">
    @import "../../sass/abstracts/_variables.scss";

    nav.top-navigation {
        background-color: $white;
        height: 50px;
        border: 2px solid $dark-color;
    }

    ul.links {
        display: block;
        float: left;

        li {
            display: inline-block;
            list-style-type: none;
            line-height: 50px;

            a {
                font-family: 'Lato', sans-serif;
                font-weight: bold;
                color: $black;

                & :hover {
                    color: $dark-color;
                }

            }
        }
    }

</style>