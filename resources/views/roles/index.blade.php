<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Role Management') }}
            </h2>
            @can('role-create')
                <a href="{{ route('roles.create') }}"
                    class="inline-flex items-
center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold

text-xs  uppercase tracking-widest hover:bg-green-700 focus:bg-green-700
active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500
focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Role
                </a>
            @endcan
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
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>

                                    <th
                                        class="px-6 py-3 text-left text-xs font-
medium text-gray-500 uppercase tracking-wider">
                                        No</th>


                                    <th
                                        class="px-6 py-3 text-left text-xs font-
medium text-gray-500 uppercase tracking-wider">
                                        Name</th>

                                    <th
                                        class="px-6 py-3 text-left text-xs font-
medium text-gray-500 uppercase tracking-wider">
                                        Action</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap
text-sm text-gray-900">
                                            {{ ++$i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap
text-sm text-gray-900">
                                            {{ $role->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap
text-sm font-medium">
                                            <a href="{{ route('roles.show', $role->id) }}"
                                                class="text-blue-600 hover:text-blue-900 mr-3">Show</a>
                                            @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Are you
sure?')">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
