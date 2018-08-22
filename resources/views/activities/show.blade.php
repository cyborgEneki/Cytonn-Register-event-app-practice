@extends('layouts.app')

@section('content')

        <h2>{{$activity->name}}</h2>
        <p>{{$activity->description}}</p>

        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/activities/{{$activity->id}}/edit" class="button edit-button">Edit</a>
        @endif

        {!! Form::open(['action' => ['ActivityController@destroy', $activity->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}

@endsection