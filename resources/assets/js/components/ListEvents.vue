<template>
    <div>

        <h4 class="form-heading">Add a new event</h4>
        <form class="form-body">
            Event name:<br>
            <input type="text" name="name">
            <br>
            Frequency:<br>
            <input type="text" name="frequency">
            Start Date:<br>
            <input type="text" name="start_date">
            Start Time:<br>
            <input type="text" name="start_time">
            Location:<br>
            <input type="text" name="location">
            Lead Start Date:<br>
            <input type="text" name="lead_start_date">
            <br>
            Activities:<br>
            <input type="text" name="activities">
            <input class="form-button" type="submit" value="Submit">
        </form>
    </div>
</template>

<script>
    export default {
        name: "ListEvents"
    }
</script>
