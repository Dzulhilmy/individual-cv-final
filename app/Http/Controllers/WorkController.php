<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::get();

        return view('work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work.create');
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
            $storeWork = new Work();

            $storeWork->title = $request->title;

            $storeWork->description = $request->description;
            $storeWork->image = $imagePath;
            $storeWork->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('work.create')->with('error', 'Data unable to save');
        }

        return redirect()->route('work.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        return view('work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
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
            $work->title = $request->title;

            $work->description = $request->description;
            $work->image = $imagePath;
            $work->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('work.edit', $work->id)->with('error',
                'Data unable to update');
        }

        return redirect()->route('work.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        try {
            $work->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('work.index')->with('error', 'Data unable to delete');
        }

        return redirect()->route('work.index')->with('success', 'Data deleted successfully');
    }
}
