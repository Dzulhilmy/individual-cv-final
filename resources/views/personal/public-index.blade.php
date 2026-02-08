<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Personal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white shadow mb-8 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                @forelse ($personals as $personal)
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-bold text-gray-800">Public CV</h1><h1 class="text-2xl font-extrabold text-indigo-600 mx-2">{{ $personal->name }}</h1>
                    </div>
                @empty
                @endforelse

                <div class="flex items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 font-semibold hover:text-indigo-600">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm text-gray-700 font-semibold hover:text-indigo-600">Log in</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

        <div class="mb-8">
            <form action="{{ route('personal.public') }}" method="GET" class="flex gap-2 max-w-xl mx-auto md:mx-0">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by name, job title, or skills..."
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="margin-top:10px; margin-bottom:10px">

                <button type="submit"
                    class="bg-indigo-600  px-6 py-2 rounded-md hover:bg-indigo-700 transition font-medium">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('personal.public') }}"
                        class="bg-gray-500  px-4 py-2 rounded-md hover:bg-gray-600 transition flex items-center">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @forelse ($personals as $personal)
                <div
                    class="bg-white overflow-hidden shadow-lg rounded-3xl hover:shadow-xl transition-shadow duration-300 flex flex-col">

                    <div class="p-8 border-b border-gray-200">
                        <div class="flex flex-col items-center text-center gap-6">

                            <div class="flex-shrink-0">
                                <div class="w-48 h-48 rounded-lg overflow-hidden border-4 border-white shadow-md bg-gray-200 flex items-center justify-center relative group mx-auto"
                                    style="margin-top: 10px; margin-bottom: 10px">
                                    @if ($personal->image)
                                        <img src="{{ asset('storage/' . $personal->image) }}"
                                            alt="{{ $personal->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                                            No Image
                                            <svg class="w-20 h-20" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-grow">

                                <h2 class="text-3xl font-bold text-gray-900">{{ $personal->name }}</h2>
                                <p class="text-xl text-indigo-600 font-medium mb-4">
                                    {{ $personal->job_title ?? 'Job Title Not Set' }}</p>

                                <div
                                    class="flex flex-wrap justify-center gap-4 text-sm text-gray-600 mt-4 bg-gray-50 p-4 rounded-lg">
                                    @if ($personal->email)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span>{{ $personal->email }}</span>
                                        </div>
                                    @endif

                                    @if ($personal->phone)
                                        <div class="flex items-center gap-2 border-l border-gray-300 pl-4">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>
                                            <span>{{ $personal->phone }}</span>
                                        </div>
                                    @endif
                                </div>

                                @if ($personal->address)
                                    <div class="flex items-center justify-center gap-2 mt-2 text-sm text-gray-600">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>{{ $personal->address }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 mb-6 p-4">
                        @if ($personal->summary)
                            <div>
                                <h3
                                    class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">
                                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md"><svg class="w-4 h-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg></span>
                                    About Me
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed italic">
                                    "{{ $personal->summary }}"
                                </p>
                            </div>
                        @endif

                        @if ($personal->experience)
                            <div>
                                <h3
                                    class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
                                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md"><svg class="w-4 h-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg></span>
                                    Experience
                                </h3>
                                <p class="text-gray-800 text-sm whitespace-pre-line">{{ $personal->experience }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 border-t pt-4 p-4">
                        @if ($personal->education)
                            <div>
                                <h3
                                    class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
                                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md"><svg class="w-4 h-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        </svg></span>
                                    Education
                                </h3>
                                <p class="text-sm text-gray-700">{{ $personal->education }}</p>
                            </div>
                        @endif

                        @if ($personal->skills)
                            <div>
                                <h3
                                    class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
                                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </span>
                                    Skills
                                </h3>
                                <div class="flex flex-wrap gap-1">
                                    {{-- Assuming skills are comma separated, split them for chips. If not, just remove the @foreach --}}
                                    @foreach (explode(',', $personal->skills) as $skill)
                                        <span
                                            class="px-2 py-1 bg-indigo-50 text-indigo-700 text-xs rounded-full border border-indigo-100">{{ trim($skill) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($personal->awards)
                            <div class="md:col-span-2">
                                <h3
                                    class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
                                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md"><svg class="w-4 h-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg></span>
                                    Awards
                                </h3>
                                <p class="text-sm text-gray-700">{{ $personal->awards }}</p>
                            </div>
                        @endif
                    </div>

                    @if ($personal->ref2_name)
                        <div class="mt-auto bg-yellow-50  border-yellow-400 p-4">
                            <h3
                                class="flex items-center gap-3 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
                                <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-md"><svg class="w-4 h-4"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg></span>
                                References
                            </h3>
                            <p class="text-sm text-yellow-900 italic uppercase">{{ $personal->ref1_name }}</p>
                            <p class="text-sm text-yellow-900 italic">{{ $personal->ref1_job }}</p>
                            <p class="text-sm text-yellow-900 italic">{{ $personal->ref1_contact }}</p>
                            <p class="text-sm text-yellow-900 italic uppercase" style="padding-top: 5px">
                                {{ $personal->ref2_name }}</p>
                            <p class="text-sm text-yellow-900 italic">{{ $personal->ref2_job }}</p>
                            <p class="text-sm text-yellow-900 italic">{{ $personal->ref2_contact }}</p>
                        </div>
                    @endif

                    <div class="mt-4 text-xs text-right text-gray-400" style="margin-bottom: 7px">
                        Profile created: {{ $personal->created_at->format('M d, Y') }}
                    </div>
                </div>
        </div>
    @empty
        <div class="col-span-1 lg:col-span-2 text-center py-20 bg-white rounded-lg shadow-sm">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No profiles found</h3>
            <p class="mt-1 text-sm text-gray-500">Try adjusting your search terms.</p>
        </div>
        @endforelse
    </div>
    </div>

    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Public CV {{ $personal->name }}. All rights
                reserved.</p>
            <div class="text-sm text-gray-500">
                Built with Laravel & Tailwind CSS
            </div>
        </div>
    </footer>
</body>

</html>
