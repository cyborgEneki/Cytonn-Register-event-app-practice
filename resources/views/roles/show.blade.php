@extends('layouts.app')

@section('content')

    <h2>{{$role->name}}</h2>
    <p>{{$role->description}}</p>

    @if(Auth::check() && Auth::user()->isAdmin)
        <a href="roles/{{$role->id}}/edit" class="button edit-button">Edit</a>
    @endif

    {!! Form::open(['action' => ['RoleController@destroy', $role->id, 'method' => 'POST' ]]) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
    {!! Form::close() !!}

@endsection