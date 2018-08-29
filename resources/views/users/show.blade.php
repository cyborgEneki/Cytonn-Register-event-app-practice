@extends('layouts.app')

@section('content')

    <h2 class="text-center">Name: {{$user->name}}</h2>
    <p class="text-center">Email: {{$user->email}}</p>
    @foreach($user->roles as $role)
        <p class="text-center">Roles: {{$role->name}}</p>
    @endforeach

    @foreach($user->activities as $activity)
        <p class="text-center">Assigned: {{$activity->name}}</p>
    @endforeach

    <div class="grid-x">
        <div class="medium-offset-2 medium-4">

            @if(Auth::check() && Auth::user()->isAdmin)
                <a href="/users/{{$user->id}}/edit" class="button el-button--primary expanded">Edit</a>
            @endif

        </div>
        <div class="medium-5">

            @if(Auth::check() && Auth::user()->isAdmin)
                {!! Form::open(['action' => ['UserController@destroy', $user->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'button alert expanded']) !!}
                {!! Form::close() !!}
            @endif

        </div>
    </div>

@endsection