@extends('layouts.auth_app')

@section('content')

<div class="login-content">
    <div class="row">
      <h2 class="text-center">LOGIN HERE</h2>
        <div class="form-container columns">
            <form class="login-form" method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

                <div class="email">

                    <input id="email" autocomplete="off" type="email" name="email" placeholder="Email" value="{{ old('email') }}" aria-describedby="emailHelpText" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-text" id="emailHelpText">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="password">

                    <input id="password" autocomplete="off" type="password" name="password" placeholder="Password" aria-describedby="passwordHelpText" required>

                    @if ($errors->has('password'))
                        <span class="help-text" id="passwordHelpText">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="level">
                    <a href="{{ route('password.request') }}">
                        &nbsp;
                        Forgot Your Password?
                    </a>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                    <button type="submit" class="button button-success expanded">
                        <i class=""></i>LOGIN
                    </button>
            </form>
            {{--<p class="help-text text-center" style="margin-top: 30px;">Don't have an account <a href="/register">Register Here</a> </p>--}}

        </div>

    </div>

</div>
@endsection
