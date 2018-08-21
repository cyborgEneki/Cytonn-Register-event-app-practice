@extends('layouts.app')

@section('content')

    <div class="grid-x">
        <div class="small-2 medium-2">
            @include ("layouts.sidebar")
        </div>

        <div class="small-10 medium-10">

            <div class="grid-x">

                <div class="form_table_arrangement">

                    @if(Auth::check() && Auth::user()->role == 'admin')
                        <a href="/events/create" class="button">Add Event</a>
                    @endif

                    <table class="table-font">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Frequency</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>Location</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if (count($events)>0)
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="/events/{{$event->id}}">{{$event->name}}</a></td>
                                    <td>{{$event->frequency}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->start_time}}</td>
                                    <td>{{$event->location}}</td>
                                </tr>
                            @endforeach
                        @else
                            <p>No events found</p>
                        @endif

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection