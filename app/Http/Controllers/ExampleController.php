<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller
{
    public function index()
    {
        $examples = Example::get();

        return view('example.index', compact('examples'));
    }

    public function create()
    {
        return view('example.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        try {
            $storeExample = new Example;

            $storeExample->name = $request->name;
            $storeExample->description = $request->description;
            $storeExample->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('example.create')->with('error', 'Data unable
to save');
        }

        return redirect()->route('example.index')->with('success', 'Data saved
successfully');
    }

    public function show(Example $example)
    {
        return view('example.show', compact('example'));
    }

    public function edit(Example $example)
    {
        return view('example.edit', compact('example'));
    }

    public function update(Request $request, Example $example)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        try {
            $example->name = $request->name;
            $example->description = $request->description;
            $example->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('example.edit', $example->id)->with('error',
                'Data unable to update');
        }

        return redirect()->route('example.index')->with('success', 'Data updated
successfully');
    }

    public function destroy(Example $example)
    {
        try {
            $example->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('example.index')->with('error', 'Data unable
to delete');
        }

        return redirect()->route('example.index')->with('success', 'Data deleted
successfully');
    }
}
