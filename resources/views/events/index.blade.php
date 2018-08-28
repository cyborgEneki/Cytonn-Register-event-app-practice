@extends('layouts.app')

@section('content')

<index-events inline-template>
    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)
            <a href="/events/create" class="button">Add Event</a>
        @endif
        <table class="table-font">
            <thead>
            <tr>
                {{--<th>#</th>--}}
                <th>Event Name</th>
                <th>Frequency</th>
                <th>Start Date</th>
            </tr>
            </thead>

            {{--@if (count($events)>0)--}}
                {{--@foreach($events as $event)--}}
                    {{--<tr>--}}
                        {{--<td>{{ ($events ->currentpage()-1) * $events ->perpage() + $loop->index + 1 }}</td>--}}
                        {{--<td><a href="/api/events/{{$event->id}}">{{$event->name}}</a></td>--}}
                        {{--<td>{{$event->frequency}}</td>--}}
                        {{--<td>{{$event->start_date}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}

                {{--{{$events->links()}}--}}

            {{--@else--}}
                {{--<p>No events found</p>--}}
            {{--@endif--}}
            {{--<tr v-for="(event, index) in events">--}}
                {{--<td>@{{index++}}</td>--}}
                {{--<td><a href= "/api/events/". @{{event.id  }} v-text="event.name"></a></td>--}}
                {{--<td >@{{event.frequency}}</td>--}}
                {{--<td>@{{event.start_date}}</td>--}}
            {{--</tr>--}}

            {{--<transition-group tag="tbody">--}}
                <tr  is="event-view" v-for="event in events" :data="event" :key="event.id"></tr>



        </table>

    </div>
</index-events>

@endsection