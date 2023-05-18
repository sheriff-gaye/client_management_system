
@extends('layouts.admin')


@section('admin_layout')


<h2 class="my-6 text-2xl  text-center font-semibold text-gray-700 dark:text-gray-200 uppercase">
    Create Position
</h2>
<div class="px-3  py-4 w-10/12  bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('position.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Position Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('position_name') border-red-800 @enderror" placeholder="President" name="position_name" value="{{old('position_name')}}" />
                @error('position_name')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>


        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Position Status
            </span>
            <div class="mt-4">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="active" />
                    <span class="ml-2">Active</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="inactive" />
                    <span class="ml-2">In Active</span>

                </label>
                @error('status')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>
        </div>

       

       
        

      


       

       

        <div class="mt-4">
            <button class="bg-red-600 text-white font-medium rounded py-2 px-3" type="submit">Send</button>

        </div>
    </form>

</div>

@endsection