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

        return response()->json([
            'status' => 'success',
            'data' => $employees
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
            'name' => 'required',
            'position' => 'required',
        ]);

        $employees = Employees::create($request->all());

        return response()->json($employees, 201);
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
        $employeesID = Employees::findOrFail($id);

        if (!$employeesID) {
            return response()->json(['error' => 'Employees not found'], 404);
        }

        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);

        $employeesID->update($request->all());

        return response()->json($employeesID);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employeesID = Employees::findOrFail($id);

        if (!$employeesID) {
            return response()->json(['error' => 'Employees not found'], 404);
        }

        $employeesID->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
