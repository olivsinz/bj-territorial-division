<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\District;
use Illuminate\Http\Request;

class DepartmentDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
        $districts = $department->districts;

        return response()->json(['department' => $department->name, 'districts' => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
}
