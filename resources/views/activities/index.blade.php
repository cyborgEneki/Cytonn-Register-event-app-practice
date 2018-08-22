@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/events/create" class="button">Add Activity</a>
        @endif

        <table class="table-font">
            <thead>
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            @if (count($events)>0)
                @foreach($events as $event)
                    <tr>
                        <td>{{ ($events ->currentpage()-1) * $events ->perpage() + $loop->index + 1 }}</td>
                        <td><a href="/api/events/{{$event->id}}">{{$event->name}}</a></td>
                        <td>{{$event->frequency}}</td>
                        <td>{{$event->start_date}}</td>
                    </tr>
                @endforeach

                {{$events->links()}}

            @else
                <p>No events found</p>
            @endif

            </tbody>
        </table>

    </div>

@endsection