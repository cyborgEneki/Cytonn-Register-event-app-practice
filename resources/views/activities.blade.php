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

                  <div style="margin:0 auto; width: 900px;">

                      <table>
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

                          @foreach($activities as $activity)
                          <tr >
                              <td>{{$activity->name}}</td>
                              <td>{{$activity->description ?? "No Description"}}</td>
                              @if(Auth::check() && Auth::user()->role == 'admin')
                              <td>


                                  <a href="#" class="button">Edit</a>
                                  <a href="#" class="alert button">Delete</a>

                              </td>
                                  @endif
                          </tr>
                          @endforeach
                          </tbody>
                      </table>

                  </div>

                </div>

            </div>
        </div>
    </div>

@endsection