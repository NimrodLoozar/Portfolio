<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::all();
        return view('projects.index', compact('projects'));
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
            'description' => 'required|string|max:50',
            'heading1' => 'required|string|max:255',
            'heading2' => 'nullable|string|max:255',
            'heading3' => 'nullable|string|max:255',
            'heading4' => 'nullable|string|max:255',
            'heading5' => 'nullable|string|max:255',
            'heading6' => 'nullable|string|max:255',
            'heading7' => 'nullable|string|max:255',
            'heading8' => 'nullable|string|max:255',
            'heading9' => 'nullable|string|max:255',
            'heading10' => 'nullable|string|max:255',
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
        $project = Projects::findOrFail($id);
        return view('projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Projects::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:30',
            'heading1' => 'required|string|max:255',
            'heading2' => 'nullable|string|max:255',
            'heading3' => 'nullable|string|max:255',
            'heading4' => 'nullable|string|max:255',
            'url' => 'required|url',
            'year' => 'required|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->file('banner')) {
            if ($project->banner) {
                $project->deleteImage($project->banner);
            }
            $data['banner'] = $request->file('banner')->store('banners', 'public');
        }

        if ($request->file('images')) {
            foreach ($project->images as $image) {
                $project->deleteImage($image);
            }

            $data['images'] = array_map(function ($image) {
                return $image->store('images', 'public');
            }, $request->file('images'));
        }

        $project->update($data);

        return redirect()->route('dashboard')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Projects::findOrFail($id);

        if ($project->banner) {
            $project->deleteImage($project->banner);
        }

        if ($project->images) {
            foreach ($project->images as $image) {
                $project->deleteImage($image);
            }
        }

        $project->delete();

        return redirect()->route('dashboard')->with('success', 'Project deleted successfully.');
    }
}
