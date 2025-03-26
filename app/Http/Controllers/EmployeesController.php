<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        // $employeesCount = $employees->count();

        return response()->json([
            'status'  => 'success',
            'message' => 'Employees retrieved successfully',
            'data'    => $employees,
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
            'name' => 'required',
            'position' => 'required',
        ]);

        try {
            $employee = Employees::create($request->all());
            return response()->json([
                'status'  => 'success',
                'message' => 'Employee created successfully',
                'data'    => $employee,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create employee',
                // 'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);

        try {
            $employee = Employees::findOrFail($id);
            $employee->update($request->all());

            return response()->json([
                'status'  => 'success',
                'message' => 'Employee updated successfully',
                'data'    => $employee,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Employee not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = Employees::findOrFail($id);
            $employee->delete();

            return response()->json([
                'status'  => 'success',
                'message' => 'Employee deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Employee not found',
            ], 404);
        }
    }
}
