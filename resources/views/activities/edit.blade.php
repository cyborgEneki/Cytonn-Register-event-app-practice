@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement events_edit">

        @if(Auth::check() && Auth::user()->isAdmin)

            <div class="level">
                <a class="button el-button--info" style="border-radius: 5px;"
                   href="/activities/{{$activity->id}}">Back</a>

                <h4 class="form-heading" style="margin-left: 400px;">Edit Activity</h4>
            </div>

            {!!  Form::open(['url' => "/activities/$activity->id", 'class'=>'form-body', 'method' => 'post']) !!}
            @csrf
            {{method_field("PATCH")}}
            Activity name<br>
            <input type="text" name="name" value="{{$activity->name}}">
            <br>
            Description<br>
            <input type="text" name="description" value="{{$activity->description}}">
            <br>
            <label>User(s) Assigned
                {!!  Form::select('user_id[]', $users->pluck('name', 'id'), $activity->users->pluck("id"), ['multiple' => true, 'id'=>'user_id']) !!}
            </label>

            <input class="button el-button--success expanded"
                   type="submit" value="Edit Activity">
            {!! Form::close() !!}

        @endif

    </div>

@endsection