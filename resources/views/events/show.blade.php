@extends('layouts.app')

@section('content')

    <div class="show_event">
        <h4>{{$event->name}}</h4>
        <br>
        <h5 class="help-text">Event Details</h5>
        <table class="table striped" style="margin-bottom: 50px;">
            <thead>
            <tr>
                <th>Frequency</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Location</th>
                <th>Lead Start Date</th>
                <th>Lead End Date</th>
                @if(Auth::check() && Auth::user()->isAdmin)
                    <th>Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            <tr class="tr_detail">
                <td>{{$event->frequency}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->start_time}}</td>
                <td>{{$event->location}}</td>
                <td>{{$event->lead_start_date}}</td>
                <td>{{$event->lead_end_date}}</td>
                @if(Auth::check() && Auth::user()->isAdmin)
                    <td>
                        <div class="grid-x">
                            <div class="medium-6">
                                <a href="/events/{{$event->id}}/edit"><i class="fas fa-edit"
                                                                         style="color: dodgerblue;margin-right: 15px"></i></a>

                            </div>
                            <div class="medium-6">
                                {!! Form::open(['action' => ['EventController@destroy', $event->id, 'method' => 'POST' ]]) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'trash-button'] )  !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                @endif

            </tr>
            </tbody>
        </table>

        <h5 class="help-text">Activities Related to the Event</h5>
        <table class="table striped">
            <thead class="text-center">
            <tr>
                <th>Admin Status</th>
                <th>Activity</th>
                <th>Activity Status</th>
                <th>Assignment Status</th>
                <th>Assignee</th>
                <th>Edit Activity</th>

            </tr>
            </thead>

            <tbody>
            @foreach($event->activities as $activity)
                <tr>


                    @if(Auth::check() && Auth::user()->isAdmin)
                        <td>

                            <activity-active :eventid="{{$event->id}}" :id="{{$activity->id}}" :ischecked="{{$activity->pivot->confirmed}}"></activity-active>
                        </td>
                    @endif

                    <td>
                        {{$activity->name}}
                    </td>

                    <td>
                        <div class="grid-x">
                            <div class="medium-6" style="padding-top: 10px;">
                                @if($activity->pivot->status==0)
                                    {!! $activity->getStatus($event) !!}
                                @endif
                            </div>
                            <div class="medium-6">

                                <div class="level">
                                    @if($activity->isOwnedByCurrentUser)

                                        <form action="/events/{{$event->id}}/{{$activity->id}}" method="post">
                                            {{csrf_field()}}

                                            <div class="grid-x">
                                                <div class="medium-8 columns">
                                                    <select class="flex" name="status">
                                                        <option value="1">Complete</option>
                                                        <option value="0">Pending</option>
                                                    </select>
                                                </div>
                                                <div class="medium-4  columns">
                                                    <button type="submit" style="background: transparent;"
                                                            class="button"><i
                                                                style="color: #fb2531;" class="fas fa-edit"></i>
                                                    </button>

                                                </div>
                                            </div>

                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </td>

                    <td>
                        {{$activity->pivot->status==1?"Complete":"Pending"}}<br/>
                    </td>

                    <td>
                        @foreach($activity->users as $user)
                            {{$user->name}}<br/>
                        @endforeach
                    </td>

                    <td>
                        <a href="/activities/{{$activity->id}}"><i class="fas fa-edit"></i></a>
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>

@endsection