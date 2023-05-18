@extends('layouts.admin')


@section('admin_layout')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Voters
</h2>

<div class="px-3  my-6 flex justify-end">
    <a href="{{route('voters.create')}}" class="w-fit justify-around px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Add Voters
        <span class="ml-2" aria-hidden="true">+</span>
    </a>
</div>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Voter</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Student ID</th>
                    <th class="px-4 py-3">Sex</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($voters  as  $voter )
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="{{asset('images')}}/{{$voter->profile}}" alt="profile" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{$voter->full_name}}</p>
                                <!-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                    10x Developer
                                </p> -->
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$voter->username}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$voter->student_id}}
                    </td>
                    <td class="px-4 py-3 text-xs">
                            {{$voter->sex}}
                    </td>
                  
                </tr>
                @empty
                <tr class='text-gray-700 dark:text-gray-400 '>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" colspan="3">No Voters Found</td>
                </tr>
                    
                @endforelse
                

                
                
            </tbody>
        </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="col-span-2"></span>
        <!-- Pagination -->
       
    </div>
</div>

@endsection