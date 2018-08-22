@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')

            <h4 class="form-heading">Add a new role</h4>

            <form class="form-body" method="post" action="/api/roles/{{$role->id}}">
                @csrf
                {{method_field("PATCH")}}
                Role name:<br>
                <input type="text" name="name" value="{{$role->name}}">
                <br>
                Display name:<br>
                <input type="text" name="display_name">
                <br>
                Description:<br>
                <input type="text" name="description" value="{{$role->description}}">
                <br>

                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection