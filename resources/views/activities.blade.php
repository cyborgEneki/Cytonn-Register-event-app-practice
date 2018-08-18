@extends('layouts.app')

@section('content')

    <div class="grid-x">
        <div class="small-2 medium-2">
            @include ("layouts.sidebar")
        </div>

        <div class="small-10 medium-10">

            <list-activities><slot></slot></list-activities>

            <hr/>

            <div>
                <table id="myActivities">
                    <thead>
                    <tr>
                        <th>Activity Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Content</td>
                        <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                    </tr>
                    <tr>
                        <td>Goes</td>
                        <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection