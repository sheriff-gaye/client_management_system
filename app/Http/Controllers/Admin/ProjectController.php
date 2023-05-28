<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectAssigned;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'clients'])->latest()->paginate(13);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('status', 0)->pluck('company_name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.projects.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $validatedData = $request->validated();
        $project = Project::create($validatedData);
        $user = User::find($request->user_id);
        $user->notify(new ProjectAssigned($project));
        return redirect()->route('crm.project.index')->with('success', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $clients = Client::where('status', 0)->pluck('company_name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.projects.edit', compact('project', 'clients', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProjectRequest $request, string $id)
    {

        $project = Project::find($id);
        if ($project->user_id !== $request->user_id) {
            $user = User::find($request->user_id);
            $user->notify(new ProjectAssigned($project));
        }
        $project->update($request->validated());
        return redirect()->back()->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if ($project->task()->exists()) {
            return redirect()->back()->with('danger', 'Cannot delete project with associated tasks.');
        }
        $project->delete();
        

        return redirect()->route('crm.project.index')->with('success', 'Project deleted successfully.');
    }
}
