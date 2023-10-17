<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Enable
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $comment->user->name ?? 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {!! $comment->content ?? 'Empty' !!}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                            <input type="checkbox" id="toggle-comment" data-id={{ $comment->id }} value="" class="sr-only peer" @checked($comment->status)>
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                            </div>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $comment->created_at->diffForHumans() ?? 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-nav-link class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            :href="route('admin.comment-destroy', $comment)" :active="request()->routeIs('comment-destroy')">
                                            {{ __('Remove') }}
                                        </x-nav-link>
                                    </td>
                                </tr>
                            @empty
                                <div class="flex items-center text-red-600 justify-center">
                                    <h3>User Not Found</h3>
                                </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


