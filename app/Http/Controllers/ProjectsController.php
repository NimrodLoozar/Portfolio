<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            'description' => 'required|string|max:30',
            'heading1' => 'required|string',
            'heading2' => 'nullable|string',
            'heading3' => 'nullable|string',
            'heading4' => 'nullable|string',
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
    public function update(Request $request, $id)
    {
        Log::info('Update method called', ['id' => $id, 'request' => $request->all()]);

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

        $data = $request->except(['banner', 'images']);
        Log::info('Validated data', ['data' => $data]);

        $project = Projects::findOrFail($id);
        Log::info('Project found', ['project' => $project]);

        if ($request->hasFile('banner')) {
            Log::info('Banner file detected');
            if ($project->banner) {
                Log::info('Deleting old banner', ['banner' => $project->banner]);
                Storage::disk('public')->delete($project->banner);
            }
            $data['banner'] = $request->file('banner')->store('banners', 'public');
            Log::info('New banner stored', ['banner' => $data['banner']]);
        }

        if ($request->hasFile('images')) {
            Log::info('Images detected');
            if ($project->images) {
                foreach ($project->images as $image) {
                    Log::info('Deleting old image', ['image' => $image]);
                    Storage::disk('public')->delete($image);
                }
            }
            $data['images'] = array_map(function ($image) {
                return $image->store('images', 'public');
            }, $request->file('images'));
            Log::info('New images stored', ['images' => $data['images']]);
        }

        $project->update($data);
        Log::info('Project updated successfully', ['project' => $project]);

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
