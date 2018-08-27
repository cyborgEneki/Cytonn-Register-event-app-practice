@extends('layouts.app')

@section('content')

    <h2>{{$event->name}}</h2>
    <table class="striped">
        <thead>
        <tr>
            <th>Frequency</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Location</th>
            <th>Lead Start Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$event->frequency}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->start_time}}</td>
            <td>{{$event->location}}</td>
            <td>{{$event->lead_start_date}}</td>


        </tr>
        </tbody>
    </table>

    <table class="hover">
        <thead>
        <tr>
            <th>Activity</th>
            <th>User Assigned</th>
            <th>User Status</th>


            <th>Status Options</th>
            @if(Auth::check() && Auth::user()->isAdmin)
                <th>Admin Status</th>
            @endif

        </tr>
        </thead>
        <tbody>
        @foreach($event->activities as $activity)
            <tr>
                <td>
                    {{$activity->name}}
                </td>
                <td>
                    @foreach($activity->users as $user)
                        {{$user->name}}<br/>
                    @endforeach
                </td>
                <td>
                    {{$activity->pivot->status==1?"Complete":"Pending"}}<br/>
                    {{--@if($activity->pivot->status==0)--}}
                    {{--'done'--}}
                    {{--@elseif($activity->pivot->status==1)--}}
                    {{--'fghhh'--}}
                    {{--@elseif($activity->pivot->status==2)--}}

                    {{--@elseif($activity->pivot->status==3)--}}
                    {{--@endif--}}
                </td>
                <td>

                    @if($activity->isOwnedByCurrentUser)

                        <form action="/events/{{$event->id}}/{{$activity->id}}" method="post">

                            {{csrf_field()}}
                            <select name="status">
                                <option value="1">Complete</option>
                                <option value="0">Pending</option>
                            </select>

                            <button type="submit" class="button">Edit</button>
                        </form>
                    @endif
                </td>
                @if(Auth::check() && Auth::user()->isAdmin)
                    <td>
                        {{$activity->checked}}<br/>
                    </td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>

    @if(Auth::check() && Auth::user()->isAdmin)
        <a href="/events/{{$event->id}}/edit" class="button edit-button">Edit</a>
    @endif

    @if(Auth::check() && Auth::user()->isAdmin)
        {!! Form::open(['action' => ['EventController@destroy', $event->id, 'method' => 'POST' ]]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}
    @endif

@endsection