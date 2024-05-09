<?php

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Town;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentTownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department): JsonResponse
    {
        $towns = $department->towns;

        return response()->json([
            'department' => $department->name,
            'towns' => $towns,
        ]);
    }
}
