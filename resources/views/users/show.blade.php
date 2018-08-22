@extends('layouts.app')

@section('content')

        <h2>{{$user->name}}</h2>
        <p>{{$user->email}}</p>
        <p>{{$user->role}}</p>

        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/users/{{$user->id}}/edit" class="button edit-button">Edit</a>
        @endif

        {!! Form::open(['action' => ['UserController@destroy', $user->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}

@endsection