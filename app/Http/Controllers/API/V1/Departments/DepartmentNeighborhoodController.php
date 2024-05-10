<?php

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DepartmentNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department): JsonResponse
    {
        $neighborhoods = cache()->remember('departments.'.$department->name.'.neighborhoods', now()->addMonths(6), function () use ($department) {
            return DB::table('neighborhoods')
                ->select('neighborhoods.name')
                ->join('districts', 'districts.id', '=', 'neighborhoods.district_id')
                ->join('towns', 'towns.id', '=', 'districts.town_id')
                ->join('departments', 'departments.id', '=', 'towns.department_id')
                ->where('departments.name', $department->name)
                ->get();
        });

        return response()->json([
            'department' => $department->name,
            'neighborhoods' => $neighborhoods,
        ]);
    }
}
