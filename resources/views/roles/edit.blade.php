<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Role') }}
            </h2>
            <a href="{{ route('roles.index') }}"
                class="inline-flex items-center
px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs
text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700
active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
focus:ring-offset-2 transition ease-in-out duration-150">
                Back
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($errors) > 0)
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500
text-red-700">
                            <p class="font-bold">Whoops! There were some problems
                                with your input.</p>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach



                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">

                            <label for="name" class="block mb-2 text-sm font-
medium text-gray-900">Name</label>

                            <input type="text" id="name" name="name" value="{{ $role->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-
gray-900">Permissions</label>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-
cols-3 gap-4">

                                @foreach ($permission as $value)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="permission_{{ $value->id }}"
                                            name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                                            {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                                            class="w-4 h-4 text-
blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">

                                        <label for="permission_{{ $value->id }}"
                                            class="ml-2 text-sm font-medium text-gray-900">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center
px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs
 uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700

active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-
offset-2 transition ease-in-out duration-150">

                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
