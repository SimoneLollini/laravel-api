<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(3);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.project.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        if ($request->hasFile('image')) {
            $image = Storage::put('uploads', $val_data['image']);
            $val_data['image'] = $image;
        }
        $project_slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $project_slug;
        if (array_key_exists("status", $val_data) and $val_data['status'] = 1) {
            $val_data['status'] = true;
        } else {
            $val_data['status'] = false;
        }
        $newProject = Project::create($val_data);


        if ($request->has('technologies')) {
            $newProject->technologies()->attach($val_data['technologies']);
        }

        return to_route('project.index')->with('message', "$newProject->title added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $image = Storage::put('uploads', $val_data['image']);
            $val_data['image'] = $image;
        }
        $project_slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $project_slug;
        if (array_key_exists("status", $val_data) and $val_data['status'] = 1) {
            $val_data['status'] = true;
        } else {
            $val_data['status'] = false;
        }
        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        return to_route('project.index')->with('message', "$project->title update!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('project.index')->with('message', "$project->title deleted!");
    }
}
