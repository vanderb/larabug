@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-9">
        <div class="panel">
            <p class="panel-heading">
                {{ $issue->subject }}
            </p>
            <div class="panel-block">
                <div class="control">
                    
                    {!! $issue->description !!}
    
                </div>
            </div>
        </div>
    </div>
    <div class="column is-3">
        <div class="panel">
            <p class="panel-heading">
                Ticketdetails
            </p>
            <div class="panel-block">
        
                <table class="table is-fullwidth">

                    <tr>
                        <td style="vertical-align: middle">Ticket</td>
                        <td>
                            #{{ $issue->id }}
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: middle">Priority</td>
                        <td>
                            {{ $issue->priority }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align: middle">Project</td>
                        <td>
                
                            @if($issue->project)
                            <a href="">{{ $issue->project->name }}</a>
                            @else
                            <i>Not assigned</i>
                            @endif
                    
                        </td>
                    </tr>
        
                    <tr>
                        <td style="vertical-align: middle">Category</td>
                        <td>
                
                            @if($issue->category)
                            <a href="">{{ $issue->category->name }}</a>
                            @else
                            <i>Not assigned</i>
                            @endif
            
                        </td>
                    </tr>
        
                    <tr>
                        <td style="vertical-align: middle">Assigned to</td>
                        <td>
                
                            @if($issue->assigned_to)
                            <a href="">{{ $issue->assigned_to->full_name }}</a>
                            @else
                            <i>Not assigned</i>
                            @endif
                    
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: middle">Milestone</td>
                        <td>
                
                            @if($issue->milestone)
                            <a href="">{{ $issue->milestone->name }}</a>
                            @else
                            <i>Not assigned</i>
                            @endif
                    
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
    </div>
</div>

@endsection
