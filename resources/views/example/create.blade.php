<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Example') }}
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
                    <form method="POST" action="{{ route('example.store') }}">
                        @csrf
                        <div class="mb-6">

                            <label for="name" class="block mb-2 text-sm font-
medium text-gray-900">

                                Name
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="bg-gray-50 border border-gray-300 text-
gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full

p-2.5 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm
font-medium text-gray-900">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4" required
                                class="bg-gray-50 border border-gray-300 text-
gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full

p-2.5 @error('description') border-red-500 @enderror">{{ old('description') }}
</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center
px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs
 uppercase tracking-widest hover:bg-green-700 focus:bg-green-700
active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500
focus:ring-offset-2 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
