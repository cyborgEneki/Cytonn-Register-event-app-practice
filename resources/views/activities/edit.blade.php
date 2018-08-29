@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="margin: 0 auto; width: 1000px;padding-top: 30px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" style="border-radius: 5px;" href="/activities/{{$activity->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit Activity</h4>
            </div>

            <form class="form-body" method="post" action="/activities/{{$activity->id}}">
                @csrf
                {{method_field("PATCH")}}
                Activity name:<br>
                <input type="text" name="name" value="{{$activity->name}}">
                <br>
                Description:<br>
                <input type="text" name="description" value="{{$activity->description}}">
                <br>

                <input class="button el-button--success expanded" style="border-radius: 12px;box-shadow: 2px 5px lightgray;"
                       type="submit" value="Edit Activity">
            </form>

        @endif

    </div>

@endsection