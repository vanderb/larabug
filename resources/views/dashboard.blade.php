@extends('layouts.app')

@section('content')
    <div class="panel">
        <p class="panel-heading">
            Dashboard
        </p>
        <div class="panel-block">
        </div>
    </div>
@endsection


@section('sidebar')
<div class="panel">
    <div class="panel-block">
      <a href="{{ route('issues.create') }}" class="button is-link is-fullwidth">
        Create new Issue
      </a>
    </div>
</div>
@endsection
