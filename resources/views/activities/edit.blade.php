@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Add a new activity</h4>

            <form class="form-body" method="post" action="/api/activities/{{$activity->id}}">
                @csrf
                {{method_field("PATCH")}}
                Activity name:<br>
                <input type="text" name="name" value="{{$activity->name}}">
                <br>
                Description:<br>
                <input type="text" name="description" value="{{$activity->description}}">
                <br>

                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection