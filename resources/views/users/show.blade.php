@extends('layouts.app')

@section('content')

        <h2>{{$data['user']->name}}</h2>
        <p>{{$data['user']->email}}</p>
        @foreach($data['roles'] as $role)
            {{$role->name}}<br/>
        @endforeach

        @if(Auth::check() && Auth::user()->isAdmin)
            <a href="/users/{{$data['user']->id}}/edit" class="button edit-button">Edit</a>
        @endif

        {!! Form::open(['action' => ['UserController@destroy', $data['user']->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'alert button delete-button']) !!}
        {!! Form::close() !!}

@endsection