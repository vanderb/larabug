@extends('layouts.app')

@section('content')

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="columns">
        <div class="column is-9">
            <div class="panel">
                <p class="panel-heading">
                    Edit User
                </p>
                <div class="panel-block">

                    <div class="control">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="{{ $user->avatar }}" alt="Avatar">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                    <small>
                                        <strong>PROFILBILD</strong>
                                        <br>                            
                                        Ändern Sie Ihr Profilbild auf <a href="gravatar.com" target="_blank">gravatar.com</a>, indem Sie Ihre E-Mail-Adresse <i>"{{ $user->email }}"</i> benutzen.
                                    </small>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>

                    <div class="control">
                        @include('notifications')
        
                        <div class="field">
                            <label class="label">Firstname</label>
                            <div class="control">
                                <input class="input" type="text" name="firstname" placeholder="Firstname of User" value="{{ old('firstname', $user->firstname) }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Lastname</label>
                            <div class="control">
                                <input class="input" type="text" name="lastname" placeholder="Lastname of User" value="{{ old('lastname', $user->lastname) }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="text" name="email" placeholder="Email of User" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" name="password_confirmation" placeholder="Repeat password">
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="field is-grouped">
                        <p class="control">
                            <button type="submit" class="button is-link">
                                Save User
                            </button>
                        </p>
                        <p class="control">
                            <a class="button is-transparent">
                                Cancel
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="panel">
                <div class="panel-block">
              
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
