<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use AuthorizesRequests ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->pluck('name', 'id');

        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Auth::user()
            ->tasks()
            ->create($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        $categories = Category::where('user_id', Auth::id())->pluck('name', 'id');

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully !!');
    }

    /**
     * Mark task complete.
     */
    public function complete(Task $task)
    {
        $this->authorize('update', $task);

        $task->update(['completed_at' => now()]);

        return redirect()->route('tasks.index')->with('success', 'Task marked complete.');
    }

    /**
     * Mark task incomplete.
     */
    public function incomplete(Task $task)
    {
        $this->authorize('update', $task);

        $task->update(['completed_at' => null]);

        return redirect()->route('tasks.index')->with('success', 'Task marked incomplete.');
    }
}
