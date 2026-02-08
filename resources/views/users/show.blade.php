<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show User') }}
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
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-
900">Name</label>

                        <p class="text-gray-700">{{ $user->name }}</p>
                    </div>
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-
900">Email</label>

                        <p class="text-gray-700">{{ $user->email }}</p>
                    </div>
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-
900">Roles</label>

                        <div class="flex flex-wrap gap-2">
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <span
                                        class="inline-flex items-center px-3 py-
1 rounded-full text-sm font-medium bg-green-100 text-green-800">

                                        {{ $v }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
