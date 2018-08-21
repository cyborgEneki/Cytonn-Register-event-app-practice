@extends('layouts.app')

@section('content')

        <div class="small-10 medium-10">

            <div class="grid-x">
                <h2>{{$data['event']->name}}</h2>
                @foreach($data['activities'] as $activity)
                    {{$activity->name}}<br/>
                @endforeach
            </div>

        </div>

@endsection