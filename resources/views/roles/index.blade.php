@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)
            <a href="/roles/create" class="button">Add Role</a>
        @endif

        <table class="table-font">
            <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Display Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            @if (count($roles)>0)
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td><a href="roles/{{$role->id}}">{{$role->name}}</a></td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->description}}</td>
                    </tr>
                @endforeach

            @else
                <p>No roles found</p>
            @endif

            </tbody>
        </table>

    </div>

@endsection