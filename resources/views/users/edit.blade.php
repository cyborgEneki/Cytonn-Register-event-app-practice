@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement edit_user">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" href="/users/{{$user->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit User Details</h4>
            </div>

            {!!  Form::open(['url' => "/users/$user->id", 'class'=>'form-body', 'method' => 'post']) !!}
            @csrf
            {{method_field("PATCH")}}
            User name:<br>
            <input type="text" name="name" value="{{$user->name}}">
            <br>
            Email:<br>
            <input type="text" name="email" value="{{$user->email}}">
            <br>

            <label>Roles
                {!!  Form::select('role_id[]', $roles->pluck('name', 'id'), $user->roles->pluck("id"), ['multiple' => true, 'id'=>'role_id']) !!}
            </label>

            <input class="button el-button--success expanded"
                   type="submit" value="Edit Activity">

            </form>

        @endif

    </div>

@endsection