<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show Example') }}
            </h2>
            <a href="{{ route('example.index') }}"
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
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium
text-gray-900">
                            Name
                        </label>
                        <input type="text" id="name" name="name" value="{{ $example->name }}" readonly
                            class="bg-gray-100 border border-gray-300 text-gray-
900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">

                    </div>
                    <div class="mb-6">


                        <label for="description" class="block mb-2 text-sm font-
medium text-gray-900">

                            Description
                        </label>
                        <textarea id="description" name="description" rows="4" readonly
                            class="bg-gray-100 border border-gray-300 text-gray-
900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">{{ $example->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
