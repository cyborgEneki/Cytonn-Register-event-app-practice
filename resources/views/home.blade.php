@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="form-container small-6 small-centered columns">

                <div class="callout log-in">
                    You are logged in!
                </div>

            </div>

        </div>

        <div class="card app-layout" style="width: 100%;">
            <div class="card-section bg-line-1">
                <h1 class="line-1">Enjoy using Cytonn Register!</h1>
            </div>
            <div class="card-section">
                <h3 class="line-2">Manage your events and keep track of assignments with ease.</h3>
            </div>
        </div>

    </div>

@endsection


<style lang="scss">

    div.log-in{
        margin-top: 1rem;
    }

    div.bg-line-1 {
        background-color: lightblue;
    }

    h1.line-1 {
        margin-top: 10%;
        text-align: center;
        margin-bottom: 10% !important;
    }

    h3.line-2 {
        margin-top: 5%;
        margin-bottom: 5% !important;
        text-align: center;
    }
</style>