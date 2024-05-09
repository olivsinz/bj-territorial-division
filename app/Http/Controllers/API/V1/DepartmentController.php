<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index(): JsonResponse
    {
        $departments = Department::all();

        return response()->json($departments);
    }
}
