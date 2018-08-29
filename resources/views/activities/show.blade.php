@extends('layouts.app')

@section('content')

    <div style="margin-top: 30px;">
        <h2 class="text-center">Name: {{$activity->name}}</h2>
        <p class="text-center">Description:{{$activity->description}}</p>


        <div class="grid-x">
            <div class="medium-offset-2 medium-4">
                @if(Auth::check() && Auth::user()->isAdmin)
                    <a href="/activities/{{$activity->id}}/edit" class="button el-button--primary expanded">Edit</a>
                @endif
            </div>
            <div class="medium-5">
                {!! Form::open(['action' => ['ActivityController@destroy', $activity->id, 'method' => 'POST' ]]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('Delete', ['class' => 'button alert expanded']) !!}
                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection