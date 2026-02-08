<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;

class CvExportController extends Controller
{
    /**
     * Render the HTML view for the browser.
     */
    public function show(Request $request)
    {
        // Fetch your CV data (User, Experience, Education)
        $data = $this->getCvData();

        return view('cv.template', $data);
    }

    /**
     * Option A: Download as High-Quality PDF (Print Purpose)
     */
    public function downloadPdf(Request $request)
    {
        $data = $this->getCvData();
        $filename = 'resume-' . date('Y-m-d') . '.pdf';

        return Pdf::view('cv.template', $data)
            ->format('a4')
            ->withBrowsershot(function (Browsershot $browsershot) {
                // crucial for loading external fonts/images correctly
                $browsershot->waitUntilNetworkIdle();
                $browsershot->scale(1.0); // Adjust scale if content is too big/small
            })
            ->name($filename)
            ->download();
    }

    /**
     * Option B: Download as High-Res Graphic (Image Purpose)
     * Great for sharing on LinkedIn/Socials
     */
    public function downloadImage(Request $request)
    {
        $data = $this->getCvData();

        // Render the view to HTML string
        $html = view('cv.template', $data)->render();

        // Convert HTML to Image using Browsershot directly
        $imageBlob = Browsershot::html($html)
            ->windowSize(1200, 1600) // Simulate a large screen/canvas
            ->deviceScaleFactor(2)   // Retina quality (2x resolution)
            ->fullPage()             // Capture full scrollable height
            ->type('png')
            ->screenshot();

        return response($imageBlob)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="resume-graphic.png"');
    }

    // Helper to mock data
    private function getCvData()
    {
        return [
            'name' => 'John Doe',
            'role' => 'Senior Laravel Developer',
            'summary' => 'Expert in building scalable web applications...',
            'skills' => ['PHP 8.2', 'Laravel 12', 'Tailwind CSS', 'Vue.js'],
        ];
    }

   
}
