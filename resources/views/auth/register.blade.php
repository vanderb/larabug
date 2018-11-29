@extends('layouts.auth')

@section('content')
<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">
                    <h3 class="title has-text-grey">{{ __('Register') }}</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </p>
                                @endif

                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="Your Email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif

                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" type="password" placeholder="Your Password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                <p class="help is-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif

                            </div>
                        </div>
    
                        <div class="field">
                            <div class="control">
                                <input class="input is-medium" type="password" name="password_confirmation" placeholder="Repeat Your Password" value="{{ old('password_confirmation') }}" required>
                            </div>
                        </div>

                        <button class="button is-block is-link is-medium is-fullwidth"> {{ __('Register') }}</button>

                    </form>
                </div>
                <p class="has-text-grey">
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
