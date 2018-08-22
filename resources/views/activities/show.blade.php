@extends('layouts.app')

@section('content')

        <h2>{{$data['event']->name}}</h2>
        <p>{{$data['event']->frequency}}</p>
        <p>{{$data['event']->start_date}}</p>
        <p>{{$data['event']->start_time}}</p>
        <p>{{$data['event']->location}}</p>
        <p>{{$data['event']->lead_start_date}}</p>
        @foreach($data['activities'] as $activity)
            {{$activity->name}}<br/>
        @endforeach

        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/events/{{$data['event']->id}}/edit" class="button edit-button">Edit</a>
        @endif

        {!! Form::open(['action' => ['EventController@destroy', $data['event']->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}

@endsection