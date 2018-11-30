@extends('layouts.app')

@section('content')
<form action="{{ route('milestones.store') }}" method="POST">
    @csrf
    <div class="panel">
        <p class="panel-heading">
            Create new Milestone
        </p>
        <div class="panel-block">
            <div class="control">
                @include('notifications')

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name" placeholder="Name of Milestone">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Due date (optional)</label>
                    <div class="control">
                        <datepicker placeholder="Due date" name="due_date"></datepicker>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Description (optional)</label>
                    <div class="control">
                        <textarea class="textarea" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="field is-grouped">
                <p class="control">
                    <button type="submit" class="button is-link">
                        Save Milestone
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

</form>
@endsection
