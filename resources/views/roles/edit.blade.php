@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 0 auto; width: 1000px;padding-top: 30px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" style="border-radius: 5px;" href="/roles/{{$role->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit Role</h4>
            </div>

            <form class="form-body" method="post" action="/roles/{{$role->id}}">
                @csrf
                {{method_field("PATCH")}}
                Role name:<br>
                <input type="text" name="name" value="{{$role->name}}">
                <br>
                Display name:<br>
                <input type="text" name="display_name" value="{{$role->display_name}}">
                <br>
                Description:<br>
                <input type="text" name="description" value="{{$role->description}}">
                <br>

                <input class="button el-button--success expanded" style="border-radius: 12px;box-shadow: 2px 5px lightgray;"
                       type="submit" value="Edit Activity">

            </form>

        @endif

    </div>

@endsection