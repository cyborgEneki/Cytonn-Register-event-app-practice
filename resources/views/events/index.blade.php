@extends('layouts.app')

@section('content')

    <index-events inline-template>
        <div class="form_table_arrangement">

           <div class="level" style="margin-top: 40px;">
               <h3 class="flex">Events</h3>

               @if(Auth::check() && Auth::user()->isAdmin)
                   <a href="events/create" class="button round end" style="background-color: #5cb85c;border-radius: 12px;">Add Event</a>
               @endif
           </div>


            <table class="table-font" style="margin-top: 40px;">
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