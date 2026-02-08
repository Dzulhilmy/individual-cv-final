<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::get();

        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',

            'description' => 'nullable|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('photos','public');
        };


        try {
            $storeEducation = new Education();

            $storeEducation->title = $request->title;

            $storeEducation->description = $request->description;
            $storeEducation->image = $imagePath;
            $storeEducation->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('education.create')->with('error', 'Data unable to save');
        }

        return redirect()->route('education.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        return view('education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'name' => 'required|max:255',

            'description' => 'nullable|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('photos','public');
        };


        try {
            $education->title = $request->title;

            $education->description = $request->description;
            $education->image = $imagePath;
            $education->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('education.edit', $education->id)->with('error',
                'Data unable to update');
        }

        return redirect()->route('education.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        try {
            $education->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('education.index')->with('error', 'Data unable to delete');
        }

        return redirect()->route('education.index')->with('success', 'Data deleted successfully');
    }
}
