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
                <table>
                    <thead>
                    <tr>
                        <th width="200">Table Header</th>
                        <th>Table Header</th>
                        <th width="150">Table Header</th>
                        <th width="150">Table Header</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Content Goes Here</td>
                        <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                        <td>Content Goes Here</td>
                        <td>Content Goes Here</td>
                    </tr>
                    <tr>
                        <td>Content Goes Here</td>
                        <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                        <td>Content Goes Here</td>
                        <td>Content Goes Here</td>
                    </tr>
                    <tr>
                        <td>Content Goes Here</td>
                        <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                        <td>Content Goes Here</td>
                        <td>Content Goes Here</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection