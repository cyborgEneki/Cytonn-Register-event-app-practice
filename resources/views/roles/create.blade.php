@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 100px auto; width: 900px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a href="/roles_blade" class="button el-button--info">Back</a>
                <h4 class="form-heading" style="margin-left: 300px;">Add a new role</h4>
            </div>

            <form class="form-body" method="post" action="/roles">
                @csrf
                Role name:<br>
                <input type="text" name="name">
                <br>
                Display name:<br>
                <input type="text" name="display_name">
                <br>
                Description:<br>
                <input type="text" name="description">
                <br>

                <input class="button expanded el-button--success" style="border-radius: 5px;" type="submit"
                       value="Submit">

            </form>

        @endif

    </div>

@endsection