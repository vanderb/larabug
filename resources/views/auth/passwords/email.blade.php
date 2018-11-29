@extends('layouts.auth')

@section('content')

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">
                    <h3 class="title has-text-grey">{{ __('Reset Password') }}</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="Your Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif

                            </div>
                        </div>

                        <button class="button is-block is-link is-medium is-fullwidth"> {{ __('Send Password Reset Link') }}</button>

                    </form>
                </div>
                <p class="has-text-grey">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> &nbsp;·&nbsp;
                    @endif
                    @if (Route::has('login'))
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
