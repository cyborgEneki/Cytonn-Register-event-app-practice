@extends('layouts.app')

@section('content')

    <index-users inline-template>
        <div class="form_table_arrangement">

            @if(Auth::check() && Auth::user()->isAdmin)
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

                <tr is="user-view" v-for="(user, index) in users" :data="user" :row="index"></tr>

                </tbody>
            </table>

        </div>

    </index-users>
@endsection