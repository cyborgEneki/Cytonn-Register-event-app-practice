@extends('layouts.app')

@section('content')

    <div class="grid-x">
      <div class="small-2 medium-2">
          @include ("layouts.sidebar")
      </div>

      <div class="small-10 medium-10">
          @include ("dashboard")
      </div>
    </div>

@endsection