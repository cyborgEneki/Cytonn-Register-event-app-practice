@extends('layouts.app')

@section('content')

    <div class="grid-x">
        <div class="small-2 medium-2">
            @include ("layouts.sidebar")
        </div>

        <div class="small-10 medium-10">

            <div class="grid-x">

                <div style="margin:0 auto; width: 900px;">

                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="event_column">Event Name</th>
                            <th>Frequency</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>Location</th>
                            <th>Lead Start Date</th>
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <th>Actions</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->frequency}}</td>
                                <td>{{$event->start_date}}</td>
                                <td>{{$event->start_time}}</td>
                                <td>{{$event->location}}</td>
                                <td>{{$event->lead_start_date}}</td>
                                <td>
                                    <a href="#" class="button">Edit</a>
                                    <a href="#" class="alert button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
    </div>

@endsection