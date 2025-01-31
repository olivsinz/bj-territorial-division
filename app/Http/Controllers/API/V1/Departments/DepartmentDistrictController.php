<?php

declare(strict_types=1);

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
        return response()
            ->json([
                'department' => $department->name,
                'districts' => $department->districts,
            ])
            ->header('Cache-Control', 'public, max-age=3600')
            ->setEtag(md5($department->name));
    }
}
