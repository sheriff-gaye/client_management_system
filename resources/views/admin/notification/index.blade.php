<!-- @if($notifications->count()) -->
<div class="px-3  my-8 flex justify-between">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 ">
        Notifications
    </h2>



</div>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Send At</th>
                    <th class="px-4 py-3">
                        <form action="{{route('notifications.destroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="w-fit  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Mark All as Read
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($notifications as $notification)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{ ucfirst(str_replace('_', ' ', $notification->data['type'])) }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $notification->data['title'] }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{ $notification->created_at->diffForHumans() }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        <form action="{{route('notifications.update',$notification)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <button class="w-fit  px-4 py-2 text-sm font-medium leading-5  transition-colors duration-150  border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple" style="background: rgb(239 68 68);color:white">
                                Mark as Read </button>
                        </form>
                    </td>
                </tr>

                @endforeach

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


<!-- @endif -->