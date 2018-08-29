@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement event_create">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Add a new event</h4>

            <form class="form-body" method="post" action="events">
                @csrf

                <div class="grid-x">
                    <div class="medium-6">
                        Event Name:<br>
                        <input type="text" name="name">
                    </div>
                    <div class="medium-6">
                        Frequency:<br>
                        <select name="frequency">
                            <option value="">How often does this recur?</option>
                            <option value="Yearly">Yearly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Daily">Daily</option>
                            <option value="Once">Once</option>
                        </select>
                    </div>
                </div>

                <div class="grid-x">
                    <div class="medium-6">
                        Start Date:<br>
                        <input type="date" name="start_date">
                    </div>
                    <div class="medium-6">
                        Start Time:<br>
                        <input type="time" name="start_time">
                    </div>
                </div>

                <div class="grid-x">
                    <div class="medium-6">
                        Location:<br>
                        <input type="text" name="location">
                    </div>
                    <div class="medium-6">
                        Lead Start Date:<br>
                        <input type="date" name="lead_start_date">
                    </div>
                </div>

                <div class="grid-x">
                    <div class="medium-6">
                        Timeline:<br>
                        <input type="date" name="lead_end_date">
                    </div>
                    <div class="medium-6">
                        <label>Activities
                            <select multiple id="activity_id" name="activity_id[]">
                                <option value>Select Activity</option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>

                <input class="button el-button--success expanded" style="font-weight: 600;border-radius: 12px;" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection