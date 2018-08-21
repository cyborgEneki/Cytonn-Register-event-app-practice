@extends('layouts.app')

@section('content')

    <div class="grid-x">
        <h2>{{$data['event']->name}}</h2>
        @foreach($data['activities'] as $activity)
            {{$activity->name}}<br/>
        @endforeach
    </div>

@endsection