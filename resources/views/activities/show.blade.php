@extends('layouts.app')

@section('content')

    <a class="button el-button--info" style="margin-top: 20px; border-radius: 5px;"
       href="/activities_blade">Back</a>

    <div class="show_activities">
        <h5 class="help-text">Activity Details</h5>

        <table class="table striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Assignee(s)</th>
                @if(Auth::check() && Auth::user()->isAdmin)
                    <th>Actions</th>
                @endif
            </tr>

            <tbody>

            <td>{{$activity->name}}</td>
            <td>{{$activity->description}}</td>
            <td>
                @if (count($activity->users)>0)
                    @foreach($activity->users as $user)
                        {{$user->name}}
                    @endforeach
                @else
                    <p style="padding-top: 20px">No one has been assigned.</p>
                @endif
            </td>


            @if(Auth::check() && Auth::user()->isAdmin)
                <td>
                    <div class="grid-x">
                        <div class="medium-6">
                            <a href="/activities/{{$activity->id}}/edit"><i class="fas fa-edit"
                                                                            style="color: dodgerblue;margin-right: 15px"></i></a>
                        </div>
                        <div class="medium-6">
                            {!! Form::open(['action' => ['ActivityController@destroy', $activity->id, 'method' => 'POST' ]]) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'trash-button'] )  !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </td>
            @endif
            </tbody>
        </table>

    </div>

@endsection