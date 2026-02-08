<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} - CV</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Fallback if Tailwind isn't loading in PDF render */
        body {
            font-family: sans-serif;
        }

        /* In your app.css or style block */

        /* Standard Web Layout */
        body {
            background: #f3f4f6;
            /* Light gray web background */
        }

        /* Print Specific Overrides */
        @media print {

            /* Set strict A4 dimensions */
            @page {
                size: A4;
                margin: 0;
                /* Let the HTML handle margins */
            }

            body {
                background: white;
                /* Clean white for print */
                -webkit-print-color-adjust: exact;
                /* Force background colors to print */
                print-color-adjust: exact;
            }

            /* Hide web-only elements */
            .no-print {
                display: none !important;
            }

            /* Ensure page breaks don't cut text in half */
            .break-inside-avoid {
                break-inside: avoid;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="no-print fixed top-0 left-0 w-full bg-white shadow p-4 flex justify-end gap-4 z-50">
        <a href="{{ route('cv.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
            Download PDF
        </a>
        <a href="{{ route('cv.image') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            Download Image
        </a>
    </div>

    <div class="max-w-[210mm] mx-auto bg-white shadow-lg mt-20 mb-20 p-12 min-h-[297mm]">

        <header class="border-b pb-8 mb-8">
            <h1 class="text-4xl font-bold uppercase tracking-wider text-gray-800">{{ $name }}</h1>
            <p class="text-xl text-blue-600 font-medium mt-2">{{ $role }}</p>
        </header>

        <div class="grid grid-cols-3 gap-8">

            <div class="col-span-1">
                <h3 class="font-bold text-gray-700 mb-4 border-b">Skills</h3>
                <ul class="space-y-2">
                    @foreach ($skills as $skill)
                        <li class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-span-2">
                <h3 class="font-bold text-gray-700 mb-4 border-b">Professional Summary</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ $summary }}
                </p>

                <div class="break-inside-avoid mb-6">
                    <h4 class="font-bold">Experience</h4>
                    <p class="text-sm text-gray-500">2020 - Present</p>
                    <p class="mt-2">Led backend development for enterprise applications...</p>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
