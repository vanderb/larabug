@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-9">
        <div class="panel">
            <div class="panel-heading flex">
                <div>
                    @if(request()->route()->getName() == 'issues.mine')
                    Issues assigned to me
                    @elseif(request()->route()->getName() == 'issues.user')
                    Issues assigned to {{ $user->full_name }}
                    @else
                    Issues
                    @endif
                </div>
                <div class="has-text-right">
                    <small>
                        <span class="tag is-dark" title="Issues">
                            {{ $issues->count() }}
                        </span>
                    </small>
                </div>
            </div>
            <div class="panel-block">
                <div class="control">
                    @include('notifications')
    
                    @if(!$issues->isEmpty())
                        <table class="table is-fullwidth">
                        <tbody>
                            @foreach($issues as $issue)
                            <tr>
                            <td class="column-quantity">
                                <span class="tag">
                                    #{{ $issue->id }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('issues.show', $issue->id) }}">{{ $issue->subject }}</a>
                                <small style="display: block;">
                                    @if($issue->project)
                                        <a href="">{{ $issue->project->name }}</a>
                                    @endif
                                    @if($issue->percentage)
                                        {{ $issue->percentage }}% complete
                                    @endif
                                </small>
                                <small>
                                    <i>
                                        Created {{ $issue->created_at->diffForHumans() }} by <a href="{{ route('issues.user', $issue->created_by->id) }}">{{ $issue->created_by->full_name }}</a>  | Edited {{ $issue->updated_at->diffForHumans() }}
                                    </i>
                                </small>
                            </td>
                            <td style="width: 15%">
                                <progress class="progress show-value is-large @if($issue->percentage) has-percentage @endif" value="{{$issue->percentage}}" max="100">{{$issue->percentage}}%</progress>
                            </td>
                            <td style="width: 10%" class="has-text-centered">
                                <span class="tag">
                                    {{ config('larabug.priorities')[$issue->priority] }}
                                </span>

                                <div>
                                    <small>{{ config('larabug.states')[$issue->state] }}</small>
                                </div>
                            </td>
                            @if(request()->route()->getName() == 'issues.index')
                            <td>
                               <small>
                                Assigned to<br>
                                <a href="{{ route('issues.user', $issue->assigned_to->id) }}">
                                    {{ $issue->assigned_to->full_name }}
                                </a>
                               </small>
                            </td>
                            @endif
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    @else
                        <div class="notification">
                        No Issues found
                        </div>
                    @endif
                </div>
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

        @if(request()->route()->getName() == 'issues.user')
        <div class="panel">
            <div class="panel-block has-text-left">
                <strong class="is-uppercase">{{ $user->full_name }}</strong>
                <a href="{{ route('issues.create') }}">
                {{ $user->email }}
                </a>
            </div>
        </div>
        @endif

        @if(request()->route()->getName() == 'issues.mine')
        <div class="panel">
            <div class="panel-block has-text-left">
                <strong class="is-uppercase">In Progress</strong>
                <progress class="progress show-value is-large" value="{{$issue->assigned_to->issue_progress}}" max="100">{{$issue->assigned_to->issue_progress}}%</progress>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
