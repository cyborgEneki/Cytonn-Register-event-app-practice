@extends('layouts.app')

@section('content')

    <a class="button el-button--info" style="margin-top: 20px; border-radius: 5px;"
       href="/roles_blade">Back</a>

    <h2 class="text-center">{{$role->name}}</h2>
    <p class="text-center">{{$role->description}}</p>



    <div class="grid-x">
        <div class="medium-offset-2 medium-4">

            @if(Auth::check() && Auth::user()->isAdmin)
                <a href="/roles/{{$role->id}}/edit" class="button el-button--primary expanded">Edit</a>
            @endif

        </div>
        <div class="medium-5">
            {!! Form::open(['action' => ['RoleController@destroy', $role->id, 'method' => 'POST' ]]) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Delete', ['class' => 'button alert expanded']) !!}
            {!! Form::close() !!}


        </div>
    </div>
@endsection