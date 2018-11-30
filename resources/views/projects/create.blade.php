@extends('layouts.app')

@section('content')
<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div class="columns">
        <div class="column is-9">
            <div class="panel">
                <p class="panel-heading">
                    Create new Project
                </p>
                <div class="panel-block">
                    <div class="control">
                        @include('notifications')
        
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" name="name" placeholder="Name of Project" value="{{ old('name') }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Description (optional)</label>
                            <div class="control">
                                <textarea class="textarea" name="description" placeholder="Description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="field is-grouped">
                        <p class="control">
                            <button type="submit" class="button is-link">
                                Save Project
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
