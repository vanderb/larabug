@extends('layouts.app')

@section('content')
<form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="columns">
        <div class="column is-9">

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
                                <input class="input" type="text" name="name" placeholder="Name of Milestone" value="{{ old('name', $milestone->name) }}">
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Due date (optional)</label>
                            <div class="control">
                                <datepicker placeholder="Due date" name="due_date" value="{{ old('due_date', $milestone->due_date->format('Y-m-d')) }}"></datepicker>
                            </div>
                        </div>
        
                        <div class="field">
                            <label class="label">Description (optional)</label>
                            <div class="control">
                                <textarea class="textarea" name="description" placeholder="Description">{{ old('desription', $milestone->desription) }}</textarea>
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
