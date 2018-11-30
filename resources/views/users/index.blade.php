@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-9">
        <div class="panel">
            <p class="panel-heading">
              Users
            </p>
            <div class="panel-block">
              <div class="control content">
                  @include('notifications')
    
                  @if(!$users->isEmpty())
                    <table class="table is-fullwidth">
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td class="column-quantity">
                              <span class="tag">
                                {{ $user->issues->count() }}
                              </span>
                          </td>
                          <td>
                            <a href="{{ route('users.edit', $user->id) }}">{{ $user->full_name }}</a><br>
            
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
                      No Users found
                    </div>
                  @endif
              </div>
            </div>
        </div>
    </div>
    <div class="column is-3">
        <div class="panel">
            <div class="panel-block">
              <a href="{{ route('users.create') }}" class="button is-link is-fullwidth">
                Create new User
              </a>
            </div>
        </div>
    </div>
</div>
@endsection
