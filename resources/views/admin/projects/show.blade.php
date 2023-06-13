@extends('layouts.admin')

@section('admin_layout')
<br><br>
<div class="bg-white shadow-lg rounded-lg p-6 mt-10 dark:bg-gray-800 text-gray-700 dark:text-gray-200">
    <h2 class=" text-3sm text-purple-700 font-bold mb-4  uppercase text-center">Project Details</h2>
    <hr>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Title</h3>
            <p>{{ $project->title}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Description</h3>
            <p>{{ $project->description}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Client</h3>
            <p>{{ $project->clients->company_name}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">User</h3>
            <p>{{ $project->user->name }}</p>
        </div>

        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Deadline</h3>
            <p>{{ $project->deadline }}</p>
        </div>
        <div class="flex flex-col">

            <p>
                @if($project->status=='completed')

                <span class="px-2 py-1 font-semibold leading-tight  rounded " style="background: rgb(22 163 74);color:white">
                    {{ucfirst($project->status)}}
                </span>
                @elseif($project->status=='open')
                <span class="px-2 py-1 font-semibold leading-tight  rounded " style="background: rgb(245 158 11); color:white">
                    {{ucfirst($project->status)}}
                </span>
                @elseif($project->status=='in progress')
                <span class="px-2 py-1 font-semibold leading-tight rounded " style="background:  rgb(22 78 99);color:white;">
                    {{ucfirst($project->status)}}
                </span>
                @elseif($project->status=='cancelled')
                <span class="px-2 py-1 font-semibold leading-tight rounded " style="background: rgb(14 165 233);color:white;">
                    {{ucfirst($project->status)}}
                </span>
                @elseif($project->status=='blocked')
                <span class="px-2 py-1 font-semibold leading-tight  rounded" style="background: rgb(239 68 68);color:white">

                    {{ucfirst($project->status)}}
                </span>

                @endif


            </p>
        </div>


    </div>
</div>


@endsection