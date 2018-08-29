<template>
    <div>
        <table class="table-font">
            <thead>
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            <!--<tr>-->
                <!--<td>{{ ($activities ->currentpage()-1) * $activities ->perpage() + $loop->index + 1 }}</td>-->
                <!--<td><a href="/api/activities/{{$activity->id}}">{{$activity->name}}</a></td>-->
                <!--<td>{{$activity->description}}</td>-->
            <!--</tr>-->

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ListEvents"
    }
</script>
