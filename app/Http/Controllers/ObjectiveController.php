<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class objectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objectives = Objective::get();

        return view('objective.index', compact('objectives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('objective.create');
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

        /*$imagePath = null;
        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('photos','public');
        };*/


        try {
            $storeObjective = new Objective;

            $storeObjective->name = $request->name;

            $storeObjective->description = $request->description;
            //$storeObjective->image = $imagePath;
            $storeObjective->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('objective.create')->with('error', 'Data unable to save');
        }

        return redirect()->route('objective.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Objective $objective)
    {
        return view('objective.show', compact('objective'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objective $objective)
    {
        return view('objective.edit', compact('objective'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Objective $objective)
    {
        $request->validate([
            'title' => 'required|max:255',

            'description' => 'nullable|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048',
        ]);

        /*$imagePath = null;
        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('photos','public');
        };*/


        try {
            $objective->name = $request->name;

            $objective->description = $request->description;
            //$objective->image = $imagePath;
            $objective->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('objective.edit', $objective->id)->with('error',
                'Data unable to update');
        }

        return redirect()->route('objective.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objective $objective)
    {
        try {
            $objective->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('objective.index')->with('error', 'Data unable to delete');
        }

        return redirect()->route('objective.index')->with('success', 'Data deleted successfully');
    }
}
