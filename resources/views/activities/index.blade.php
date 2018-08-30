@extends('layouts.app')

@section('content')

    <index-activities inline-template>

        <div class="form_table_arrangement">


                <div class="level" style="margin-top: 20px;">
                    <h3 class="flex">Activities</h3>

                    @if(Auth::check() && Auth::user()->isAdmin)
                        <a href="/activities/create" class="button round end"
                           style="background-color: #5cb85c;border-radius: 12px;">Add Activity</a>
                    @endif

                </div>

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