@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 100px auto; width: 900px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a href="/users_blade" class="button el-button--info">Back</a>

                <h4 class="form-heading" style="margin-left: 300px;">Add a User</h4>
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


                <input class="button expanded el-button--success" style="border-radius: 5px;" type="submit"
                       value="Submit">

            </form>

        @endif

    </div>

@endsection