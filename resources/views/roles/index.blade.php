@extends('layouts.app')

@section('content')

    <index-roles inline-template>
        <div class="form_table_arrangement" style="margin-top:30px;">

                <div class="level">
                    <h3 class="flex">Roles</h3>
                    @if(Auth::check() && Auth::user()->isAdmin)
                        <a href="/roles/create" class="button end">Add Role</a>
                    @endif
                </div>

            <table class="table-font" style="margin-top: 20px;">
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