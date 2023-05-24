<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['client', 'project', 'user'])->latest()->get();
        return view('admin.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('status', 0)->pluck('company_name', 'id');
        $projects = Project::all()->pluck('title', 'id');
        $users = User::all()->pluck('name', 'id');
        return view('admin.task.create', compact('users', 'clients', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::find($request->user_id);
        $task = Task::create($validatedData);
        $user->notify(new TaskAssigned($task));

        return redirect()->route('task.index')->with('success', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task=Task::find($id);
        return view('admin.task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clients = Client::where('status', 0)->pluck('company_name', 'id');
        $projects = Project::all()->pluck('title', 'id');
        $users = User::all()->pluck('name', 'id');
        $task = Task::find($id);
        return view('admin.task.edit', compact('task', 'users', 'projects', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTaskRequest $request, string $id)
    {

        $task = Task::find($id);
        if ($task->user_id !== $request->user_id) {
            $user = User::find($request->user_id);
            $user->notify(new TaskAssigned($task));
        }
        $task->update($request->validated());

        return redirect()->route('task.index')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if ($task->project->id) {
            return redirect()->back()->with('danger', 'Cannot delete task project exists.');
        }

        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}
