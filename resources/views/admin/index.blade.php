@extends('layouts.admin')


@section('admin_layout')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Dasboard
</h2>

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Users
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$users->count()}}
      </p>
    </div>
  </div>
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Clients
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$clients}}
      </p>
    </div>
  </div>
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Tasks
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$tasks}}
      </p>
    </div>
  </div>
  <!-- Card -->
  <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
      </svg>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        Total Projects
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$projects}}
      </p>
    </div>
  </div>
</div>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Users
</h2>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">User</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @forelse ($users as $user )

        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3 text-sm">
            {{$user->name}}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$user->email}}
          </td>

          <td class="px-4 py-3 text-sm">
           @if($user->id==Auth::user()->id)
           <div class="flex items-center space-x-4 text-sm">
              <a href="{{route('profile.edit',$user->id)}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg> </a>
            </div>
           @endif

          </td>
        </tr>


        @empty

        <tr class='text-gray-700 dark:text-gray-400 '>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" colspan="4">No Position Found</td>
        </tr>

        @endforelse

      </tbody>
    </table>
  </div>
  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
      <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">

        </ul>
      </nav>
    </span>
  </div>
</div>

<!-- New Table
<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">Client</th>
          <th class="px-4 py-3">Amount</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Date</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">
              Avatar with inset shadow
              <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
              </div>
              <div>
                <p class="font-semibold">Hans Burger</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                  10x Developer
                </p>
              </div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            $ 863.45
          </td>
          <td class="px-4 py-3 text-xs">
            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
              Approved
            </span>
          </td>
          <td class="px-4 py-3 text-sm">
            6/10/2020
          </td>
        </tr>

        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">
              Avatar with inset shadow
              <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
              </div>
              <div>
                <p class="font-semibold">Hans Burger</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                  10x Developer
                </p>
              </div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            $ 863.45
          </td>
          <td class="px-4 py-3 text-xs">
            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
              Approved
            </span>
          </td>
          <td class="px-4 py-3 text-sm">
            6/10/2020
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
  
    <span class="col-span-2"></span>
    Pagination
   
  </div>
</div> -->


<!-- 

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Charts
</h2>
<div class="grid gap-6 mb-8 md:grid-cols-2">
  <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
      Revenue
    </h4>
    <canvas id="pie"></canvas>
    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
      Chart legend
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
        <span>Shirts</span>
      </div>
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
        <span>Shoes</span>
      </div>
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
        <span>Bags</span>
      </div>
    </div>
  </div>
  <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
      Traffic
    </h4>
    <canvas id="line"></canvas>
    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
      Chart legend
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
        <span>Organic</span>
      </div>
      <div class="flex items-center">
        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
        <span>Paid</span>
      </div>
    </div>
  </div>
</div>

-->



@endsection