@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Edit user details</h4>

            <form class="form-body" method="post" action="/api/users/{{$data['user']->id}}">
                @csrf
                {{method_field("PATCH")}}
                User name:<br>
                <input type="text" name="name" value="{{$data['user']->name}}">
                <br>
                Email:<br>
                <input type="text" name="email" value="{{$data['user']->email}}">
                <br>
                {{--Role:<br>--}}
                {{--<input type="text" name="role" value="{{$user->role}}">--}}
                {{--<br>--}}
                <label>Roles
                    <select multiple id="role_id" name="role_id[]">
                        <option value="">Select Role</option>
                        @foreach($data['roles'] as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </label>
                <input class="form-button" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection