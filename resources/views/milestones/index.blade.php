@extends('layouts.app')

@section('content')
    <div class="panel">
        <p class="panel-heading">
          Milestones
        </p>
        <div class="panel-block">
          <div class="control content">
              @include('notifications')

              @if(!$milestones->isEmpty())
                <table class="table is-fullwidth">
                  <tbody>
                    @foreach($milestones as $milestone)
                    <tr>
                      <td class="column-quantity">
                          <span class="tag">
                            {{ $milestone->issues->count() }}
                          </span>
                      </td>
                      <td>
                        <a href="{{ route('milestones.show', $milestone->id) }}">{{ $milestone->name }}</a><br>
                        <small>
                          @if($milestone->due_date)
                            Due on {{ $milestone->due_date->format('d.m.Y') }}
                          @else
                            No due date
                          @endif
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
                  No Milestones found
                </div>
              @endif
          </div>
        </div>
    </div>
@endsection

@section('sidebar')
<div class="panel">
    <div class="panel-block">
      <a href="{{ route('milestones.create') }}" class="button is-link is-fullwidth">
        Create new Milestone
      </a>
    </div>
</div>
@endsection
