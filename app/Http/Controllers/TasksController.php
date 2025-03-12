<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::join('employees', 'tasks.employee_id', '=', 'employees.id')
            ->select('tasks.*', 'employees.name')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'task_name' => 'required',
            'due_date' => 'required',
        ]);

        $tasks = Tasks::create($request->all());

        return response()->json($tasks, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $taskID = Tasks::findOrFail($id);

        if (!$taskID) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $request->validate([
            'employee_id' => 'required',
            'task_name' => 'required',
            'due_date' => 'required',
        ]);

        $taskID->update($request->all());

        return response()->json($taskID);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $taskID = Tasks::findOrFail($id);

        if (!$taskID) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $taskID->delete();

        return response()->json(200);
    }
}
