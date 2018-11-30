@extends('layouts.app')

@section('content')
    <div class="panel">
        <p class="panel-heading">
            Create new Issue
        </p>
        <div class="panel-block">
            <form action="">
                @csrf

                <div class="field">
                    <label class="label">Subject</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Short description if issue">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <vue-editor></vue-editor>
                    </div>
                </div>

            </form>
        </div>
        <div class="panel-footer">
            <div class="field is-grouped">
                <p class="control">
                    <a class="button is-link">
                        Save Issue
                    </a>
                </p>
                <p class="control">
                    <a class="button is-transparent">
                        Cancel
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
<div class="panel">
    <p class="panel-heading">
        Ticketdetails
    </p>
    <div class="panel-block">

        <table class="table is-fullwidth">
            <tr>
                <td style="vertical-align: middle">Project</td>
                <td>
                    <div class="select">
                        <select name="projet_id">
                            <option>No Project</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle">Priority</td>
                <td>
                    <div class="select">
                        <select name="priority">
                            @foreach($priorities as $key => $priority)
                            <option value="{{ $key }}" @if(old('priority', 1) == $key) selected @endif>{{ $priority }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle">Assigned to</td>
                <td>
                    <div class="select">
                        <select name="assignee_id">
                            <option>Not selected</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" @if(old('assignee_id') == $user->id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="vertical-align: middle">Milestone</td>
                <td>
                    <div class="select">
                        <select name="milestone_id">
                            <option>No Milestone</option>
                            @foreach($milestones as $milestone)
                            <option value="{{ $milestone->id }}" @if(old('milestone_id') == $milestone->id) selected @endif>{{ $milestone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</div>

<div class="panel">
    <p class="panel-heading">
        Attachments
    </p>
    <div class="panel-block">
        <vue-dropzone ref="attachments" id="attachments" :options="dropzoneOptions" @vdropzone-file-added="handleAttachments"></vue-dropzone>
        
        <table class="table is-fullwidth attachment-table" v-if="files.length">
            <tr v-for="(file, key) in files" :key="key">
                <td>
                    <a href="">@{{ file.name }}</a>
                </td>
                <td>
                    @{{ file.size }}
                </td>
                <td class="has-text-right">
                    <a href="" @click.prevent="removeAttachment(file)"><font-awesome-icon icon="trash"></font-awesome-icon></a>
                </td>
            </tr>
        </table>

        <ul>
            <li >
                
            </li>
        </ul>
    </div>
</div>
@endsection
