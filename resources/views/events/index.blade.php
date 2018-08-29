@extends('layouts.app')

@section('content')

    <index-events inline-template>
        <div class="form_table_arrangement">

            @if(Auth::check() && Auth::user()->isAdmin)
                <a href="events/create" class="button">Add Event</a>
            @endif

            <table class="table-font">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Frequency</th>
                    <th>Start Date</th>
                </tr>
                </thead>

                <tr is="event-view" v-for="(event, index) in events" :data="event" :row="index"></tr>

            </table>

        </div>
    </index-events>

@endsection