@extends('layouts.app')

@section('content')

    <index-roles inline-template>
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
                <tr is="role-view" v-for="(role, index) in roles" :data="role" :row="index"></tr>
                </tbody>

            </table>

        </div>
    </index-roles>
@endsection