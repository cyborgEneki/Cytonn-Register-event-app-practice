@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Edit event</h4>

            <form class="form-body" method="post" action="/api/events/{{$event->id}}">
                @csrf
                {{method_field("PATCH")}}
                Event name:<br>
                <input type="text" name="name" value="{{$event->name}}">
                <br>
                Frequency:<br>
                <select name="frequency">
                    <option value="">How often does this recur?</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Daily">Daily</option>
                    <option value="Once">Once</option>
                </select>
                Start Date:<br>
                <input type="date" name="start_date" value="{{$event->start_date}}">
                Start Time:<br>
                <input type="time" name="start_time" value="{{$event->start_time}}">
                Location:<br>
                <input type="text" name="location" value="{{$event->location}}">
                Lead Start Date:<br>
                <input type="date" name="lead_start_date" value="{{$event->lead_start_date}}">
                <br>
                <label>Activities
                    <select multiple id="activity_id" name="activity_id[]">
                        <option value="">Select Activity</option>
                        @foreach($activities as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                        @endforeach
                    </select>
                </label>

                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection