@extends('layouts.admin')

@section('admin_layout')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 uppercase">
    Create Project
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('crm.project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Project Tilte</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('title') border-red-800 @enderror" placeholder="Title" name="title" value="{{old('title')}}" />
                @error('title')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-3">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray  @error('description') border-red-800 @enderror" name="description" rows="3" placeholder="Enter some long form content.">{{old('description')}}</textarea>
                @error('description')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Deadline</span>
                <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('deadline') border-red-800 @enderror" name="deadline" value="{{old('deadline')}}" />
                @error('deadline')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>


        <div class="mt-4">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Assigned User
                </span>
                <select name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                
                @foreach ($users as $id=>$user )
                <option value="{{$id}}">{{$user}}</option>
   
                @endforeach
                    
                </select>
            </label>
            @error('user_id')
            <p class="text-red-700 text-xs">{{ $message }}</p>
            @enderror
        </div>


        <div class="mt-4">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Assigned Client
                </span>
                <select name="client_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                   @foreach ($clients as $id=>$client )
                   <option value="{{$id}}">{{$client}}</option>
                   @endforeach

                </select>
            </label>
            @error('client_id')
            <p class="text-red-700 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Project Status
                </span>
                <select name="status" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @foreach (App\Models\Project::STATUS as $status )
                
                <option value="{{$status}}">{{ucfirst($status)}}</option>
                @endforeach    
                    
                </select>
            </label>
            @error('status')
            <p class="text-red-700 text-xs">{{ $message }}</p>
            @enderror
        </div>









        <div class="mt-4">
            <button class="bg-red-600 text-white font-medium rounded py-2 px-3" type="submit">Send</button>

        </div>
    </form>

</div>
@endsection