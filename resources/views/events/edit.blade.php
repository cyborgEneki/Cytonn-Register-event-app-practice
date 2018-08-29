@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 0 auto; width: 1000px;padding-top: 30px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" style="border-radius: 5px;" href="/events/{{$event->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit event</h4>
            </div>

            {!!  Form::open(['url' => "/events/$event->id", 'class'=>'form-body', 'method' => 'post']) !!}
            @csrf
            {{method_field("PATCH")}}
            Event name:<br>
            <input type="text" name="name" value="{{$event->name}}">
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
            Timeline:<br>
            <input type="date" name="lead_end_date" value="{{$event->lead_end_date}}">
            <label>Activities
                {{--<select multiple id="activity_id" name="activity_id[]">--}}
                {{--<option value="">Select Activity</option>--}}
                {{--@foreach($activities as $activity)--}}
                {{--<option value="{{ $activity->id }}">{{ $activity->name }}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}

                {!!  Form::select('activity_id[]', $activities->pluck('name', 'id'), $event->activities->pluck("id"), ['multiple' => true, 'id'=>'activity_id']) !!}
            </label>

            <input class="button el-button--success expanded" style="border-radius: 12px;box-shadow: 2px 5px lightgray;"
                   type="submit" value="Submit">
            {!! Form::close() !!}

        @endif

    </div>


    {{--<script>--}}
    {{--window.document.getElementById("activity_id").value(["3", "5"]).prop("selected", true);--}}
    {{--</script>--}}

@endsection
