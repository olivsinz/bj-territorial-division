<?php

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $departments = cache()->remember('departments', now()->addMonths(1), function () {
            return Department::select('id', 'name')->get();
        });

        return response()->json($departments);
    }
}
