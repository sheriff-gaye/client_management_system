@extends('layouts.admin')

@section('admin_layout')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Edit Clients Information
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('client.update',$client->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Company Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('company_name') border-red-800 @enderror" placeholder="Amazon" name="company_name" value="{{$client->company_name}}" />
                @error('company_name')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('email') border-red-800 @enderror" placeholder="example@gmail.com" name="email" value="{{$client->email}}" />
                @error('email')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contact Number</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('phone') border-red-800 @enderror" placeholder="+233456**4676" name="phone" value="{{$client->phone}}" />
                @error('phone')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>


        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Company Address</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('company_address') border-red-800 @enderror" placeholder="Japan" name="company_address" value="{{$client->company_address}}" />
                @error('company_address')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>


        <div class="mt-2">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">City</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('company_city') border-red-800 @enderror" placeholder="Tokyo" name="company_city" value="{{$client->company_city}}" />
                @error('company_city')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>
       

        

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Comapany Zip</span>
                <input  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('company_zip') border-red-800 @enderror" name="company_zip" value="{{$client->company_zip}}" placeholder="63478" />
                @error('company_zip')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mt-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Company Vat</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @error('company_vat') border-red-800 @enderror" name="company_vat" value="{{$client->company_vat}}" placeholder="64676" />
                @error('company_vat')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </label>
        </div>

       
       

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Client Status
            </span>
            <div class="mt-4">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="0" {{old('status', $client->status)=='0' ? 'checked' : ''}} />
                    <span class="ml-2">Active</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status" value="1"  {{old('status',  $client->status)=='1' ? 'checked' : ''}}/>
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