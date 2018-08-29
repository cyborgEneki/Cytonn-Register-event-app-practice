@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 0 auto; width: 1000px;padding-top: 30px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" style="border-radius: 5px;" href="/users/{{$user->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit User Details</h4>
            </div>

            <form class="form-body" method="post" action="/users/{{$user->id}}">
                @csrf
                {{method_field("PATCH")}}
                User name:<br>
                <input type="text" name="name" value="{{$user->name}}">
                <br>
                Email:<br>
                <input type="text" name="email" value="{{$user->email}}">
                <br>
                <label>Roles
                    <select multiple id="role_id" name="role_id[]">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </label>

                <input class="button el-button--success expanded" style="border-radius: 12px;box-shadow: 2px 5px lightgray;"
                       type="submit" value="Edit Activity">

            </form>

        @endif

    </div>

@endsection