@extends('layouts.app')

@section('content')

    <index-activities inline-template>

        <div class="form_table_arrangement">

            @if(Auth::check() && Auth::user()->isAdmin)
                <a href="/activities/create" class="button">Add Activity</a>
            @endif

            <table class="table-font">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Activity Name</th>
                    <th>Description</th>
                </tr>
                </thead>

                <tr is="activity-view" v-for="(activity, index) in activities" :data="activity" :row="index"></tr>

            </table>

        </div>

    </index-activities>
@endsection