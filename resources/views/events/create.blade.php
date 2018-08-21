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
                    <h4 class="form-heading">Add a new event</h4>
                    <form class="form-body" method="post" action="/events">
                        @csrf
                        Event name:<br>
                        <input type="text" name="name" required>
                        <br>
                        Frequency:<br>
                        <input type="text" name="frequency">
                        Start Date:<br>
                        <input type="date" name="start_date">
                        Start Time:<br>
                        <input type="time" name="start_time">
                        Location:<br>
                        <input type="text" name="location">
                        Lead Start Date:<br>
                        <input type="date" name="lead_start_date">
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
        </div>
    </div>
</div>