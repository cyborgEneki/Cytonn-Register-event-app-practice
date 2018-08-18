<template>
    <div>

        <h3 class="form-heading">Add a new activity</h3>
        <form class="form-body">
            Activity name:<br>
            <input type="text" name="name">
            <br>
            Description:<br>
            <input type="text" name="lastname">
            <br>
            <input class="form-button" type="submit" value="Submit">
        </form>
    </div>
</template>

<script>
    export default {
        name: "ListActivities"
    }
</script>
