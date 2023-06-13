@extends('layouts.admin')

@section('admin_layout')
<br><br>
<div class="bg-white shadow-lg rounded-lg p-6 mt-10 text-gray-700 dark:text-gray-200 dark:bg-gray-800">
    <h2 class=" text-3sm text-purple-700 font-bold mb-4  uppercase text-center">Task Details</h2>
    <hr>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Title</h3>
            <p>{{ $task->title}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Description</h3>
            <p>{{ $task->description}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Client</h3>
            <p>{{ $task->project->title}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Client</h3>
            <p>{{ $task->client->company_name}}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">User</h3>
            <p>{{ $task->deadline }}</p>
        </div>

        <div class="flex flex-col">

            <p>
                @if($task->status=='pending')

                <span class="px-2 py-1 font-semibold leading-tight  rounded  " style="background:  pink;color:white;">
                    {{ucfirst($task->status)}}
                </span>
                @elseif($task->status=='open')
                <span class="px-2 py-1 font-semibold leading-tight rounded" style="background: rgb(245 158 11); color:white">
                    {{ucfirst($task->status)}}
                </span>
                @elseif($task->status=='in progress')
                <span class="px-2 py-1 font-semibold leading-tight  rounded" style="background:  rgb(22 78 99);color:white;">
                    {{ucfirst($task->status)}}
                </span>
                @elseif($task->status=='waiting client')
                <span class="px-2 py-1 font-semibold leading-tight rounded" style="background:  rgb(14 165 233);color:white;">
                    {{ucfirst($task->status)}}
                </span>
                @elseif($task->status=='blocked')
                <span class="px-2 py-1 font-semibold leading-tight  rounded " style="background: rgb(239 68 68);color:white">
                    {{ucfirst($task->status)}}
                </span>
                @elseif($task->status=='closed')
                <span class="px-2 py-1 font-semibold leading-tight  rounded " style="background: green;color:white">
                    {{ucfirst($task->status)}}
                </span>

                @endif


            </p>
        </div>


    </div>
</div>


@endsection