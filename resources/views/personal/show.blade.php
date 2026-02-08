<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('CV Details') }}
            </h2>

            <div class="flex space-x-3">
                <a href="{{ route('personal.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    ← Back
                </a>

                <a href="{{ route('personal.edit', $personal->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit Profile
                </a>

                <button onclick="openPrintWindow('{{ route('personal.print', $personal->id) }}')"> 🖨️ Print PDF
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div
                    class="bg-gray-50 border-b border-gray-200 p-8 flex flex-col md:flex-row items-center md:items-start gap-8">
                    <div class="flex-shrink-0">
                        @if ($personal->image)
                            <img class="h-32 w-32 rounded-full object-cover border-4 border-white shadow-md"
                                src="{{ asset('storage/' . $personal->image) }}" alt="{{ $personal->name }}">
                        @else
                            <div
                                class="h-32 w-32 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 font-bold text-2xl border-4 border-white shadow-md">
                                {{ substr($personal->name, 0, 1) }}
                            </div>
                        @endif
                    </div>

                    <div class="text-center md:text-left flex-grow">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $personal->name }}</h1>
                        <p class="text-xl text-indigo-600 font-medium">{{ $personal->job_title }}</p>

                        <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $personal->email }}
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                {{ $personal->phone }}
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $personal->address }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-0">

                    <div class="col-span-2 p-8 border-r border-gray-100">

                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-3">Professional Objective</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $personal->summary }}</p>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-3">Work Experience</h3>
                            <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $personal->experience }}
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-3">Education</h3>

                            <ul class="space-y-2">
                                @foreach (explode("\n", $personal->education) as $edu)
                                    @if (trim($edu))
                                        <li class="flex items-start text-gray-600 leading-relaxed">
                                            <span
                                                class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3 mt-2 shrink-0"></span>

                                            <span>{{ $edu }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-span-1 bg-gray-50 p-8">

                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-3">Skills</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach (explode("\n", $personal->skills) as $skill)
                                    @if (trim($skill))
                                        <span
                                            class="px-3 py-1 bg-white border border-gray-200 rounded-full text-sm text-gray-700 shadow-sm">{{ $skill }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @if ($personal->awards)
                            <div class="mb-8">
                                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-3">Awards
                                </h3>
                                <div class="text-gray-600 text-sm whitespace-pre-line">{{ $personal->awards }}</div>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-3">References
                            </h3>

                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-4 shadow-sm">
                                <p class="font-bold text-gray-800">{{ $personal->ref1_name }}</p>
                                <p class="text-xs text-gray-500 uppercase">{{ $personal->ref1_job }}</p>
                                <p class="text-sm text-indigo-600 mt-1">{{ $personal->ref1_contact }}</p>
                            </div>

                            @if ($personal->ref2_name)
                                <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                                    <p class="font-bold text-gray-800">{{ $personal->ref2_name }}</p>
                                    <p class="text-xs text-gray-500 uppercase">{{ $personal->ref2_job }}</p>
                                    <p class="text-sm text-indigo-600 mt-1">{{ $personal->ref2_contact }}</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openPrintWindow(url) {
            const width = 900;
            const height = 800;
            const left = (window.innerWidth / 2) - (width / 2);
            const top = (window.innerHeight / 2) - (height / 2);

            const printWindow = window.open(
                url,
                'PrintCV',
                `width=${width},height=${height},top=${top},left=${left},scrollbars=yes,resizable=yes`
            );

            if (printWindow) {
                printWindow.focus();
            }
        }
    </script>
</x-app-layout>
