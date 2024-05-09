<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Neighborhood;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department): JsonResponse
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
}
