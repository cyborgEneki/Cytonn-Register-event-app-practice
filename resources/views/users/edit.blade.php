@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')

            <h4 class="form-heading">Edit user details</h4>

            <form class="form-body" method="post" action="/api/users/{{$user->id}}">
                @csrf
                {{method_field("PATCH")}}
                User name:<br>
                <input type="text" name="name" value="{{$user->name}}">
                <br>
                Email:<br>
                <input type="text" name="email" value="{{$user->email}}">
                <br>
                Role:<br>
                <input type="text" name="role" value="{{$user->role}}">
                <br>
                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection