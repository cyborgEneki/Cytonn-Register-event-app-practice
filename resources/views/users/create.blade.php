@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')

            <h4 class="form-heading">Add a new user</h4>

            <form class="form-body" method="post" action="/api/users">
                @csrf
                Name:<br>
                <input type="text" name="name">
                <br>
                Email:<br>
                <input type="text" name="email">
                <br>
                Role:<br>
                <input type="text" name="role">
                <br>

                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection