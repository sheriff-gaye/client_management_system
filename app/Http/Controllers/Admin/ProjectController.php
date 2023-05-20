<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'clients'])->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('status',0)->pluck('company_name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.projects.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects,title',
            'description' => 'required',
            'deadline' => 'required',
            'client_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);
        // dd($request->all());
        Project::create($request->all());

        return redirect()->route('project.index')->with('success','Project Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $clients = Client::where('status',0)->pluck('company_name', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.projects.edit', compact('project', 'clients', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'client_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $project = Project::find($id);
        $project->update($request->all());
        return redirect()->route('project.index')->with('success','Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('project.index')->with('danger',"Project Deleted Successfully");

    }
}
