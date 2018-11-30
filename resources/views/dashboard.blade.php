@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-9">
        <div class="panel">
            <p class="panel-heading">
                Dashboard
            </p>
            <div class="panel-block">
            </div>
        </div>
    </div>
    <div class="column is-3">
        <div class="panel">
            <div class="panel-block">
                <a href="{{ route('issues.create') }}" class="button is-link is-fullwidth">
                Create new Issue
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
