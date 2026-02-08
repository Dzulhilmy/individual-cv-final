<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New User') }}
            </h2>
            <a href="{{ route('users.index') }}"
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
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="mb-6">

                            <label for="name" class="block mb-2 text-sm font-
medium text-gray-900">Name</label>

                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm

note-3.md 2026-01-29

18 / 36

rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6">

                            <label for="email" class="block mb-2 text-sm font-
medium text-gray-900">Email</label>

                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6">

                            <label for="password" class="block mb-2 text-sm font-
medium text-gray-900">Password</label>

                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6">

                            <label for="confirm-password" class="block mb-2 text-
sm font-medium text-gray-900">Confirm
                                Password</label>

                            <input type="password" id="confirm-password" name="confirm-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900
text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6">

                            <label for="roles" class="block mb-2 text-sm font-
medium text-gray-900">Roles</label>

                            <select id="roles" name="roles[]" multiple
                                class="bg-
gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-
500 focus:border-blue-500 block w-full p-2.5">

                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Hold Ctrl
                                (Windows) or Command (Mac) to select multiple roles</p>
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
