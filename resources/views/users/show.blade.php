@extends('layouts.app')

@section('content')

    <h2>{{$user->name}}</h2>
    <p>{{$user->email}}</p>
    @foreach($user->roles as $role)
        {{$role->name}}<br/>
    @endforeach
    @foreach($user->activities as $activity)
        {{$activity->name}}<br/>
    @endforeach

    @if(Auth::check() && Auth::user()->isAdmin)
        <a href="/users/{{$user->id}}/edit" class="button edit-button">Edit</a>
    @endif

    @if(Auth::check() && Auth::user()->isAdmin)
        {!! Form::open(['action' => ['UserController@destroy', $user->id, 'method' => 'POST' ]]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}
    @endif

@endsection