@extends('layouts.app')

@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="columns">
        <div class="column is-9">

            <div class="panel">
                <p class="panel-heading">
                    Create new User
                </p>
                <div class="panel-block">
                    <div class="control">
                        @include('notifications')
        
                        <div class="field">
                            <label class="label">Firstname</label>
                            <div class="control">
                                <input class="input" type="text" name="firstname" placeholder="Firstname of User" value="{{ old('firstname') }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Lastname</label>
                            <div class="control">
                                <input class="input" type="text" name="lastname" placeholder="Lastname of User" value="{{ old('lastname') }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="text" name="email" placeholder="Email of User" value="{{ old('email') }}">
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
