<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('CV Personal Profiles') }}
            </h2>
            <a href="{{ route('personal.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-700 transition ease-in-out duration-150">
                + Create New CV
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Photo
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Job Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact Info
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($personals as $personal)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($personal->image)
                                                <img src="{{ asset('storage/'. $personal->image) }}" alt="Profile" class="h-12 w-12 rounded-full object-cover border border-gray-300">
                                            @else
                                                <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">
                                                    No Img
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                            {{ $personal->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $personal->job_title ?? 'N/A' }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <div class="flex flex-col">
                                                <span>{{ $personal->email }}</span>
                                                <span class="text-xs text-gray-400">{{ $personal->phone }}</span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <a href="{{ route('personal.show', $personal->id ) }}"
                                               class="text-green-600 hover:text-green-900 mr-4 font-semibold">
                                                View
                                            </a>

                                            <a href="{{ route('personal.edit', $personal->id ) }}"
                                               class="text-indigo-600 hover:text-indigo-900 mr-4 font-semibold">
                                                Edit
                                            </a>

                                            <form action="{{ route('personal.destroy', $personal->id ) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 font-semibold"
                                                        onclick="return confirm('Are you sure you want to delete this CV profile?')">
                                                    Delete
                                                </button>
                                            </form>

                                            <button onclick="openPrintWindow('{{ route('personal.print', $personal->id) }}')"
                                                    class="text-gray-600 hover:text-black mr-4 font-semibold transition duration-150 ease-in-out"
                                                    title="Print Professional CV">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                    Print
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <p class="text-lg font-medium">No CV profiles found.</p>
                                                <p class="text-sm">Get started by creating a new one.</p>
                                            </div>
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

    <script>
        function openPrintWindow(url) {
            // 1. Set dimensions for an A4-like preview window
            const width = 900;
            const height = 800;

            // 2. Center the window on the user's screen
            const left = (window.innerWidth / 2) - (width / 2);
            const top = (window.innerHeight / 2) - (height / 2);

            // 3. Open the window
            // 'scrollbars=yes,resizable=yes' ensures the user can adjust if needed
            const printWindow = window.open(
                url,
                'PrintCV',
                `width=${width},height=${height},top=${top},left=${left},scrollbars=yes,resizable=yes`
            );

            // 4. Focus on the new window so the print dialog appears on top
            if (printWindow) {
                printWindow.focus();
            }
        }
    </script>

</x-app-layout>
