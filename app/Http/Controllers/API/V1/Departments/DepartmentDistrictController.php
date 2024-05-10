<?php

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department): JsonResponse
    {
        $districts = $department->districts;

        return response()->json(['department' => $department->name, 'districts' => $districts]);
    }
}
