@extends('layouts.app')

@section('content')

    <index-users inline-template>
        <div class="form_table_arrangement index_user" style="margin-top:30px;">

            <div class="level">
                <h3 class="flex">Users</h3>
                @if(Auth::check() && Auth::user()->isAdmin)
                    <a href="/users/create" class="button round add_user end">Add User</a>
                @endif
            </div>

            <table class="table-font" style="margin-top: 20px;">
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