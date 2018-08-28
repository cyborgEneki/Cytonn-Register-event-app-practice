@extends('layouts.app')

@section('content')

    <div class="form_table_arrangement">

        @if(Auth::check() && Auth::user()->isAdmin)
            <a href="activities/create" class="button">Add Activity</a>
        @endif

        <table class="table-font">
            <thead>
            <tr>
                <th>#</th>
                <th>Activity Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            @if (count($activities)>0)
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ ($activities ->currentpage()-1) * $activities ->perpage() + $loop->index + 1 }}</td>
                        <td><a href="activities/{{$activity->id}}">{{$activity->name}}</a></td>
                        <td>{{$activity->description}}</td>
                    </tr>
                @endforeach

                {{$activities->links()}}

            @else
                <p>No activities found</p>
            @endif

            </tbody>
        </table>

    </div>

@endsection