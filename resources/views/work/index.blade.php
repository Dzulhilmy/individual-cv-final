<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Work & Related Experience') }}
            </h2>

            <a href="{{ route('work.create') }}"
                class="inline-flex items-
center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold

text-xs  uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700

active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-
offset-2 transition ease-in-out duration-150">

                Create New
            </a>
        </div>
    </x-slot>
    <div class="py-12">



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($message = Session::get('success'))
                        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-
500 text-green-700">

                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500
text-red-700">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left
text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left
text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left
text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left
text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($works as $work)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap
text-sm text-gray-900">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap
text-sm text-gray-900">
                                            {{ $work->title }}
                                        </td>




                                        <td class="px-6 py-4 text-sm text-gray-
900">

                                            {{ $work->description }}
                                        </td>




                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('work.show', $work->id ) }}"
                                                class="text-green-600 hover:text-green-900 mr-3">Show</a>
                                            <a href="{{ route('work.edit', $work->id ) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <form action="{{ route('work.destroy', $work->id ) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure?')">

                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>

                                        <td colspan="4" class="px-6 py-4 text-
center text-sm text-gray-500">

                                            No data available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
