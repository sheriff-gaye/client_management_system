@extends('layouts.admin')

@section('admin_layout')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Candidate Details
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('candidate.store')}}" method="POST" enctype="multipart/form-data">
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
                <span class="text-gray-700 dark:text-gray-400">Date of Birth</span>
                <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('dob ') border-red-800 @enderror" name="dob" placeholder="Jane Doe" value="{{old('dob')}}" />
                @error('dob')
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
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sex" value="male" {{ old('sex')=='male' ? 'checked' :'' }} />
                    <span class="ml-2">Male</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sex" value="female" {{old('sex')=='female' ? 'checked' : ''}} />
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
                <input type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('email') border-red-800 @enderror" name="email" value="{{old('email')}}" placeholder="example@gmail.com" />
                @error('email')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('phone') border-red-800 @enderror" name="phone" value="{{old('phone')}}" placeholder="+233 0506264676" />
                @error('phone')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Position
                </span>
                <select name="position" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    @foreach(App\Models\Position::all() as $position)
                    <option value="{{$position->position_name}}" {{ old('position') == $position->id ? 'selected' : null }}>{{$position->position_name}}</option>
                    @endforeach
                </select>
            </label>
            @error('position')
            <p class="text-red-700 text-xs">{{ $message }}</p>
            @enderror
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

        <div class="mt-3">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Biography</span>
                <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray  @error('biography') border-red-800 @enderror" name="biography" rows="3" placeholder="Enter some long form content.">{{old('biography')}}</textarea>
                @error('biography')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Candidate Status
            </span>
            <div class="mt-4">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="0" {{old('status')=='0' ? 'checked' : ''}} />
                    <span class="ml-2">Active</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="1"  {{old('status')=='1' ? 'checked' : ''}}/>
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