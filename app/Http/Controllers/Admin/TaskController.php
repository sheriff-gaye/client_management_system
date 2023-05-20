<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::with(['client','project','user'])->latest()->get();
        return view('admin.task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('status',0)->pluck('company_name', 'id');
        $projects=Project::all()->pluck('title','id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.task.create',compact('users','clients','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:tasks,title',
            'description' => 'required',
            'deadline' => 'required',
            'client_id' => 'required',
            'user_id' => 'required',
            'project_id'=>'required',
            'status' => 'required'
        ]);

        Task::create($request->all());

        return redirect()->route('task.index')->with('success','Task Created Successfully');
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
        $clients = Client::where('status',0)->pluck('company_name', 'id');
        $projects=Project::all()->pluck('title','id');
        $users = User::all()->pluck('name', 'id');
        $task=Task::find($id);
        return view('admin.task.edit',compact('task','users','projects','clients'));
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
            'project_id'=>'required',
            'status' => 'required'
        ]);

        $task=Task::find($id);
        $task->update($request->all());

        return redirect()->route('task.index')->with('success','Task Updated Successfully');
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::find($id);
        $task->delete();

        return redirect()->route('task.index')->with('danger','Task Deleted Successfully');
        
    }
}
