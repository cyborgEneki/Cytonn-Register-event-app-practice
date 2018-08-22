@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/users/create" class="button">Add User</a>
        @endif

        <table class="table-font">
            <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>

            @if (count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <td>{{ ($users ->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}</td>
                        <td><a href="/api/users/{{$user->id}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                    </tr>
                @endforeach

                {{$users->links()}}

            @else
                <p>No users found</p>
            @endif

            </tbody>
        </table>

    </div>

@endsection