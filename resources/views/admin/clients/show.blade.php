@extends('layouts.admin')

@section('admin_layout')
<br><br>
<div class="bg-white shadow-lg rounded-lg p-6 mt-10 text-gray-700 dark:text-gray-200 dark:bg-gray-800">
    <h2 class=" text-3sm text-purple-700 font-bold mb-4  uppercase text-center">Client Details</h2>
    <hr>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Email</h3>
            <p>{{ $client->email }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Phone</h3>
            <p>{{ $client->phone }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Company Name</h3>
            <p>{{ $client->company_name }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Company Address</h3>
            <p>{{ $client->company_address }}</p>
        </div>

        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Company City</h3>
            <p>{{ $client->company_city }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Company ZIP</h3>
            <p>{{ $client->company_zip }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Company VAT</h3>
            <p>{{ $client->company_vat }}</p>
        </div>
        <div class="flex flex-col">
            <h3 class="text-sm font-l mb-2">Status</h3>
           <p>
           @if($client->status==0)
            <span class="px-4 py-3 font-semibold leading-tight  rounded w-fit" style="background:  rgb(22 163 74);color:white">
                Active
            </span>
            @else
            <span class="px-2 py-1 font-semibold leading-tight  rounded " style="background: rgb(239 68 68);color:white">
                In active
            </span>
            @endif
           </p>
        </div>
    </div>
</div>


@endsection