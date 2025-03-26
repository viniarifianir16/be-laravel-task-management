<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use function Symfony\Component\Clock\now;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::with('employee')->get();

        return response()->json([
            'status'  => 'success',
            'message' => 'Tasks retrieved successfully',
            'data'    => $tasks,
        ], 200);
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

        try {
            $task = Tasks::create($request->all());
            return response()->json([
                'status'  => 'success',
                'message' => 'Task created successfully',
                'data'    => $task,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create task',
                // 'error'   => $e->getMessage(),
            ], 500);
        }
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
        $request->validate([
            'employee_id' => 'required',
            'task_name' => 'required',
            'due_date' => 'required',
        ]);

        try {
            $task = Tasks::findOrFail($id);
            $task->update($request->all());

            return response()->json([
                'status'  => 'success',
                'message' => 'Task updated successfully',
                'data'    => $task,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Task not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $task = Tasks::findOrFail($id);
            $task->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Task deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Task not found',
            ], 404);
        }
    }
}
