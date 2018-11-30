@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-9">
        <div class="panel">
            <p class="panel-heading">
              Projects
            </p>
            <div class="panel-block">
              <div class="control content">
                  @include('notifications')
    
                  @if(!$projects->isEmpty())
                    <table class="table is-fullwidth">
                      <tbody>
                        @foreach($projects as $project)
                        <tr>
                          <td class="column-quantity">
                              <span class="tag">
                                {{ $project->issues->count() }}
                              </span>
                          </td>
                          <td>
                            <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a><br>
                            <small>
                                Created {{ $project->created_at->diffForHumans() }}
                            </small>
                          </td>
                          <td class="has-text-right">
                            <a href="" class="button is-danger is-small">
                                <font-awesome-icon icon="trash"></font-awesome-icon> <span>Delete</span>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <div class="notification">
                      No Projects found
                    </div>
                  @endif
              </div>
            </div>
        </div>
    </div>
    <div class="column is-3">
        <div class="panel">
            <div class="panel-block">
              <a href="{{ route('projects.create') }}" class="button is-link is-fullwidth">
                Create new Project
              </a>
            </div>
        </div>
    </div>
</div>
@endsection
