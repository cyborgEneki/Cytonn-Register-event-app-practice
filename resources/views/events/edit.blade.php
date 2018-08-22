@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')

            <h4 class="form-heading">Add a new event</h4>

            <form class="form-body" method="post" action="/api/events/{{$data['event']->id}}">
                @csrf
                {{method_field("PATCH")}}
                Event name:<br>
                <input type="text" name="name" value="{{$data['event']->name}}">
                <br>
                Frequency:<br>
                <input type="text" name="frequency" value="{{$data['event']->frequency}}">
                Start Date:<br>
                <input type="date" name="start_date" value="{{$data['event']->start_date}}">
                Start Time:<br>
                <input type="time" name="start_time" value="{{$data['event']->start_time}}">
                Location:<br>
                <input type="text" name="location" value="{{$data['event']->location}}">
                Lead Start Date:<br>
                <input type="date" name="lead_start_date" value="{{$data['event']->lead_start_date}}">
                <br>
                <label>Activities
                    <select multiple id="activity_id" name="activity_id[]">
                        <option value="">Select Activity</option>
                        @foreach($data['activities'] as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                        @endforeach
                    </select>
                </label>

                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection