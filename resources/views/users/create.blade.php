@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement user_create">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a href="/users_blade" class="button el-button--info">Back</a>

                <h4 class="form-heading add_header">Add a User</h4>
            </div>


            <form class="form-body" method="post" action="/users">
                @csrf
                Name:<br>
                <input type="text" name="name">
                <br>
                Email:<br>
                <input type="text" name="email">
                <br>
                <label>Roles
                    <select multiple id="role_id" name="role_id[]">
                        <option value>Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </label>


                <input class="button expanded el-button--success" type="submit"
                       value="Submit">

            </form>

        @endif

    </div>

@endsection