<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $personals = Personal::latest()->get();

        return view('personal.index', compact('personals'));
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // New Fields
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'awards' => 'nullable|string',
            'skills' => 'nullable|string',
            'ref1_name' => 'nullable|string|max:255',
            'ref1_job' => 'nullable|string|max:255',
            'ref1_contact' => 'nullable|string|max:255',
            'ref2_name' => 'nullable|string|max:255',
            'ref2_job' => 'nullable|string|max:255',
            'ref2_contact' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('profiles', 'public');
            }

            // Use the validated array directly
            Personal::create($validated);

            return redirect()->route('personal.index')->with('success', 'CV Profile saved successfully');
        } catch (\Exception $e) {
            // This will print the ACTUAL error to your log file (storage/logs/laravel.log)
            Log::error('Database Error: '.$e->getMessage());

            return back()->withInput()->with('error', 'Database Error: '.$e->getMessage());
        }
    }

    public function show(Personal $personal)
    {
        return view('personal.show', compact('personal'));
    }

    public function printCV($id)
    {
        $personal = Personal::findOrFail($id);

        // This returns a specific view file called 'print.blade.php'
        // instead of the standard 'show.blade.php'
        return view('personal.print', compact('personal'));
    }

    public function edit(Personal $personal)
    {
        return view('personal.edit', compact('personal'));
    }

    public function update(Request $request, Personal $personal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'summary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // New Fields
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'awards' => 'nullable|string',
            'skills' => 'nullable|string',
            'ref1_name' => 'nullable|string|max:255',
            'ref1_job' => 'nullable|string|max:255',
            'ref1_contact' => 'nullable|string|max:255',
            'ref2_name' => 'nullable|string|max:255',
            'ref2_job' => 'nullable|string|max:255',
            'ref2_contact' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('image')) {
                // Remove old photo
                if ($personal->image) {
                    Storage::disk('public')->delete($personal->image);
                }
                $validated['image'] = $request->file('image')->store('profiles', 'public');
            }

            $personal->update($validated);

            return redirect()->route('personal.index')->with('success', 'CV Profile updated successfully.');
        } catch (\Exception $e) {
            Log::error('Update Error: '.$e->getMessage());

            return back()->withInput()->with('error', 'Unable to update profile.');
        }
    }

    public function destroy(Personal $personal)
    {
        if ($personal->image) {
            Storage::disk('public')->delete($personal->image);
        }

        $personal->delete();

        return redirect()->route('personal.index')->with('success', 'Profile deleted successfully.');
    }

    public function publicIndex(Request $request)
    {
        $query = \App\Models\Personal::query();

        // Check if there is a search term in the URL
        if ($request->has('search')) {
            $searchTerm = $request->get('search');

            // Filter where Name OR Description contains the term
            $query->where('name', 'like', '%'.$searchTerm.'%')
                ->orWhere('job_title', 'like', '%'.$searchTerm.'%')->
                orWhere('email', 'like', '%'.$searchTerm.'%')->
                orWhere('phone', 'like', '%'.$searchTerm.'%')->
                orWhere('address', 'like', '%'.$searchTerm.'%')->
                orWhere('summary', 'like', '%'.$searchTerm.'%')->
                orWhere('experience', 'like', '%'.$searchTerm.'%')->
                orWhere('education', 'like', '%'.$searchTerm.'%')->
                orWhere('skills', 'like', '%'.$searchTerm.'%')->
                orWhere('awards', 'like', '%'.$searchTerm.'%')->
                orWhere('ref1_name', 'like', '%'.$searchTerm.'%')->
                orWhere('ref2_name', 'like', '%'.$searchTerm.'%')->
                orWhere('created_at', 'like', '%'.$searchTerm.'%');
        }

        // Get the results (latest first)
        $personals = $query->latest()->get();

        return view('personal.public-index', compact('personals'));
    }
}
