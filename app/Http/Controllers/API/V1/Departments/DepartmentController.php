<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cacheTTL = 3600;
        $cacheKey = 'departments';

        $departments = Cache::remember($cacheKey, $cacheTTL, function () {
            return Department::select('id', 'name')->get();
        });

        return response()
            ->json($departments)
            ->header('Cache-Control', 'public, max-age=' . $cacheTTL)
            ->setEtag(md5($cacheKey));
    }
}
