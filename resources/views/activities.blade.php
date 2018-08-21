@extends('layouts.app')

@section('content')
    <div class="grid-x">
        <div class="small-2 medium-2">
            @include ("layouts.sidebar")
        </div>

        <div class="small-10 medium-10">
            <div class="container_content">
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <list-activities>
                        <slot></slot>
                    </list-activities>
                @endif

                <hr/>

                <div class="grid-x">

                    <div class="form_table_arrangement">

                        <table class="table-font">
                            <thead>
                            <tr>
                                <th width="20%">Activity Name</th>
                                <th width="60%">Description</th>
                                @if(Auth::check() && Auth::user()->role == 'admin')
                                    <th width="20%">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

                            @if (count($activities) > 0)
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{$activity->name}}</td>
                                        <td>{{$activity->description ?? "No Description"}}</td>
                                        @if(Auth::check() && Auth::user()->role == 'admin')
                                            <td>
                                                <a href="#" class="button edit-button">Edit</a>
                                                <a href="#" class="alert button delete-button">Delete</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <p>No activities found</p>
                            @endif

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection