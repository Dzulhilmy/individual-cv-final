<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $personal->name }} - CV</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Open+Sans:wght@300;400;600&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* 1. Page Setup for A4 */
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            background: #525659;
            font-family: 'Open Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        .font-heading {
            font-family: 'Montserrat', sans-serif;
        }

        /* 2. The A4 Sheet container */
        .a4-sheet {
            width: 210mm;
            min-height: 297mm;
            margin: 30px auto;
            background: rgb(27, 81, 115);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            display: flex;
            /* Side-by-side layout */
            overflow: hidden;
        }

        /* 3. PRINT MODE OVERRIDES */
        @media print {
            body {
                background: white;
            }

            .a4-sheet {
                width: 100%;
                height: 100%;
                margin: 0;
                box-shadow: none;
            }

            .no-print {
                display: none !important;
            }

            /* Force Background Colors */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body class="antialiased text-gray-800">

    <div class="fixed top-5 right-5 flex gap-3 no-print z-50">
        <button onclick="window.print()"
            class="bg-[#323b4c] hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
            🖨️ Print
        </button>
        <button onclick="window.close()"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded shadow-lg">
            Close
        </button>
    </div>

    <div class="a4-sheet">
        <div class="a4-sheet flex flex-row">

            <div class="w-[35%] bg-[#323b4c] text-white p-8 flex flex-col pt-12 shrink-0">

                <div class="flex justify-center mb-10">
                    <div style="width: 50mm; height: 65mm max-width:50mm;"
                        class="rounded-sm border-[3px] border-white/80 overflow-hidden bg-gray-300 shadow-md">
                        @if ($personal->image)
                            <img src="{{ asset('storage/' . $personal->image) }}" class="w-full h-full object-cover">
                        @else
                            <div
                                class="flex flex-col items-center justify-center h-full w-full text-gray-500 bg-gray-200">
                                <span class="text-[10px] font-bold uppercase tracking-wider">Photo</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-10">
                    <h3 class="text-2xl font-bold font-heading mb-2">Contact</h3>
                    <div class="h-0.5 w-full bg-gray-500/50 mb-6"></div>
                    <div class="space-y-5 text-[13px] leading-relaxed font-light tracking-wide">
                        <div>
                            <p class="font-bold text-gray-300 text-xs mb-1">Phone</p>
                            <p>{{ $personal->phone }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-300 text-xs mb-1">Email</p>
                            <p class="break-all">{{ $personal->email }}</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-300 text-xs mb-1">Address</p>
                            <p>{{ $personal->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-10">
                    <h3 class="text-2xl font-bold font-heading mb-2">Education</h3>
                    <div class="h-0.5 w-full bg-gray-500/50 mb-6"></div>

                    <ul class="space-y-3">
                        @foreach (explode("\n", $personal->education) as $edu)
                            @if (trim($edu))
                                {{-- REMOVED: flex, items-start, and the span tag --}}
                                <li class="text-[13px] font-light leading-snug text-gray-100">
                                    {{ $edu }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="mb-10">
                    <h3 class="text-2xl font-bold font-heading mb-2">Expertise</h3>
                    <div class="h-0.5 w-full bg-gray-500/50 mb-6"></div>
                    <ul class="space-y-3">
                        @foreach (explode("\n", $personal->skills) as $skill)
                            @if (trim($skill))
                                <li class="flex items-center text-[13px] font-light">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full mr-3 opacity-70"></span>
                                    {{ $skill }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="flex-1 bg-white p-12 pt-14 flex flex-col" style="padding-left: 20px; padding-top:10px;">

                <div class="mb-12">
                    <h1
                        class="text-[3.2rem] font-bold text-[#323b4c] leading-tight uppercase font-heading tracking-tight"
                        style="padding-top:7px;">
                        {{ $personal->name }}
                    </h1>
                    <p class="text-xl tracking-[0.15em] uppercase text-gray-500 font-medium mt-1"
                    style="padding-top:7px;">
                        {{ $personal->job_title }}
                    </p>
                    <div class="mt-8 text-gray-600 text-[0.9rem] leading-7 font-light text-justify"
                    style="padding-top:7px;">
                        {{ $personal->summary }}
                    </div>
                </div>

                <div class="mb-10 flex-grow">
                    <h3 class="text-3xl font-bold text-[#323b4c] font-heading mb-2" style="padding-top:10px;">Experience</h3>
                    <div class="h-0.5 w-full bg-gray-300 mb-8"></div>
                    <div class="relative border-l-[2px] border-gray-800 ml-2 space-y-10 py-1">
                        <div class="relative pl-8">
                            <span
                                class="absolute -left-[9px] top-2 h-[16px] w-[16px] rounded-full border-[2px] border-gray-800 bg-white"></span>
                            <div class="text-gray-700 text-sm leading-7 whitespace-pre-line font-light"
                            style="padding-top:7px;">
                                {{ $personal->experience }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-auto">
                    <h3 class="text-3xl font-bold text-[#323b4c] font-heading mb-2" style="padding-top:10px;">Reference</h3>
                    <div class="h-0.5 w-full bg-gray-300 mb-8"></div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-bold text-[#323b4c] text-lg font-heading" style="padding-top:7px;">{{ $personal->ref1_name }}</h4>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">{{ $personal->ref1_job }}
                            </p>
                            <div class="text-sm text-gray-600 mt-2 space-y-1">
                                <p><span class="font-semibold text-gray-400 text-xs uppercase mr-1">Email / Phone:</span>
                                    {{ $personal->ref1_contact }}</p>
                            </div>
                        </div>
                        @if ($personal->ref2_name)
                            <div>
                                <h4 class="font-bold text-[#323b4c] text-lg font-heading" style="padding-top:7px;">{{ $personal->ref2_name }}
                                </h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">
                                    {{ $personal->ref2_job }}</p>
                                <div class="text-sm text-gray-600 mt-2 space-y-1">
                                    <p><span class="font-semibold text-gray-400 text-xs uppercase mr-1">Email / Phone:</span>
                                        {{ $personal->ref2_contact }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Auto-print logic
        if (window.opener) {
            setTimeout(() => {
                window.print();
            }, 800);
        }
    </script>
</body>

</html>
