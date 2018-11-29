@extends('layouts.auth')

@section('content')

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">
                    <div class="avatar">
                        <div class="logo">
                            <span>
                                <font-awesome-icon icon="bug" class="has-text-link"></font-awesome-icon>
                            </span>
                            <span>LARA<strong>BUG</strong></span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="Your Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" type="password" placeholder="Your Password" required>
                                @if ($errors->has('password'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <label class="checkbox" for="remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button class="button is-block is-link is-medium is-fullwidth">{{ __('Login') }}</button>

                    </form>
                </div>
                <p class="has-text-grey">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> &nbsp;·&nbsp;
                    @endif
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
