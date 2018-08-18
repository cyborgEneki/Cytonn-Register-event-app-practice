@extends('layouts.auth_app')

@section('content')

<div class="container" style="margin-top: 30px;">
    <h2 class="text-center">REGISTER HERE</h2>

    <div class="row">

        <div class="form-container small-6 small-centered columns">
            <form class="register-form" method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}

                <div class="name">

                    <input id="name" type="text" autocomplete="off" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" aria-describedby="nameHelpText" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-text" id="nameHelpText">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="email">

                    <input id="email" type="email" placeholder="Email" autocomplete="off" name="Email" value="{{ old('email') }}" aria-describedby="emailHelpText" required>

                    @if ($errors->has('email'))
                        <span class="help-text" id="emailHelpText">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="role">
                    <div>
                        <select name="role">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="regular">Regular</option>
                        </select>
                    </div>
                </div>

                <div class="password">

                    <input id="password" type="password" placeholder="Password" name="password" aria-describedby="passwordHelpText" required>

                    @if ($errors->has('password'))
                        <span class="help-text" id="passwordHelpText">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="password-confirm">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                </div>

                    <button type="submit" class="button expanded">
                        REGISTER
                    </button>

                <p class="help-text text-center" style="margin-top: 30px;">Have an account <a href="/login">Login Here</a> </p>

            </form>

        </div>

    </div>

</div>

@endsection
