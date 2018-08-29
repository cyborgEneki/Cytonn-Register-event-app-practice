@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement" style="padding: 30px;">

        @if(Auth::check() && Auth::user()->isAdmin)

            <h4 class="form-heading">Add a new activity</h4>

            <form class="form-body" method="post" action="/activities" style="margin: 0 auto; width: 700px;">
                @csrf
                Activity name:<br>
                <input type="text" name="name">
                <br>
                Description:<br>
                <input type="text" name="description">
                <br>
                <label>User(s) Assigned
                    <select multiple id="user_id" name="user_id[]">
                        <option value>Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>


                </label>

                <input class="button expanded el-button--success" style="font-weight: 600;border-radius: 12px;" type="submit" value="Submit">

            </form>

        @endif

    </div>

@endsection