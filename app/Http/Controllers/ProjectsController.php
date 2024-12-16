<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:25000',
            'url' => 'required|url',
            'year' => 'required|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('banners', 'public');
        }

        if ($request->hasFile('images')) {
            $data['images'] = array_map(function ($image) {
                return $image->store('images', 'public');
            }, $request->file('images'));
        }

        Projects::create($data);

        return redirect()->route('dashboard')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
