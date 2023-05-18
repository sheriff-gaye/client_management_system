
@extends('layouts.external')


@section('content')


<h2 class="my-6 text-2xl  text-center font-semibold text-gray-700 dark:text-gray-200 uppercase">
    Register your Votes
</h2>
<div class="px-3  py-4 w-10/12  bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('voters.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('full_name') border-red-800 @enderror" placeholder="Jane Doe" name="full_name" value="{{old('full_name')}}" />
                @error('full_name')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('date_of_birth') border-red-800 @enderror" name="username" placeholder="sgaye" value="{{old('username')}}" />
                @error('username')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Sex
            </span>
            <div class="mt-4">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sex" value="male" {{ old('sex') == 'male' ? 'checked' : '' }}  />
                    <span class="ml-2">Male</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sex" value="female" {{ old('sex') == 'female' ? 'checked' : '' }}  />
                    <span class="ml-2">Female</span>

                </label>
                @error('sex')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('email') border-red-800 @enderror" name="email" placeholder="example@gmail.com" value="{{old('email')}}" />
                @error('email')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Student ID</span>
                <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('sudent_id') border-red-800 @enderror" name="student_id" placeholder="204***16" value="{{old('student_id')}}" />
                @error('student_id')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>
        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Profile</span>
                <input type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('profile') border-red-800 @enderror" name="profile" />
                @error('profile')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

       

        <div class="mt-4">
            <button class="bg-red-600 text-white font-medium rounded py-2 px-3" type="submit">Send</button>

        </div>
    </form>

</div>

@endsection