@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Edit event</h4>

            {!!  Form::open(['url' => "/events/$event->id", 'class'=>'form-body', 'method' => 'post']) !!}
                @csrf
                {{method_field("PATCH")}}
                Event name:<br>
                <input type="text" name="name" value="{{$event->name}}">
                <br>
                Frequency:<br>
                <select name="frequency">
                    <option value="{{$event->frequency}}">{{$event->frequency}}</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Daily">Daily</option>
                    <option value="Once">Once</option>
                </select>
                Start Date:<br>
                <input type="date" name="start_date" value="{{ $event->start_date}}">
                Start Time:<br>
                <input type="time" name="start_time" value="{{$event->start_time}}">
                Location:<br>
                <input type="text" name="location" value="{{$event->location}}">
                Lead Start Date:<br>
                <input type="date" name="lead_start_date" value="{{$event->lead_start_date}}">
                <br>
                Timeline:<br>
                <input type="date" name="lead_end_date" value="{{$event->lead_end_date}}">
                <br>
                <label>Activities
                    {{--<select multiple id="activity_id" name="activity_id[]">--}}
                        {{--<option value="">Select Activity</option>--}}
                        {{--@foreach($activities as $activity)--}}
                            {{--<option value="{{ $activity->id }}">{{ $activity->name }}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}

                    {!!  Form::select('activity_id[]', $activities->pluck('name', 'id'), $event->activities->pluck("id"), ['multiple' => true, 'id'=>'activity_id']) !!}
                </label>

                <input class="form-button" type="submit" value="Submit">
            {!! Form::close() !!}

        @endif

    </div>


    {{--<script>--}}
        {{--window.document.getElementById("activity_id").value(["3", "5"]).prop("selected", true);--}}
    {{--</script>--}}

@endsection
