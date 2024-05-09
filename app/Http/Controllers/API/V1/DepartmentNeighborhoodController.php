<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
        $neighborhoods = DB::table('neighborhoods')
            ->select('neighborhoods.name')
            ->join('districts', 'districts.id', '=', 'neighborhoods.district_id')
            ->join('towns', 'towns.id', '=', 'districts.town_id')
            ->join('departments', 'departments.id', '=', 'towns.department_id')
            ->where('departments.name', $department->name)
            ->get();

        return response()->json(['department' => $department->name, 'neighborhoods' => $neighborhoods]);
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
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Neighborhood $neighborhood)
    {
        //
    }
}
