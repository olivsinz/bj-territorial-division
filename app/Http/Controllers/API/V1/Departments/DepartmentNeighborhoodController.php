<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DepartmentNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department): JsonResponse
    {
        $cacheKey = 'departments.' . $department->name . '.neighborhoods';
        $cacheTTL = 3600;

        $neighborhoods = Cache::remember($cacheKey, $cacheTTL, function () use ($department) {
            return DB::table('neighborhoods')
                ->select('neighborhoods.name')
                ->join('districts', 'districts.id', '=', 'neighborhoods.district_id')
                ->join('towns', 'towns.id', '=', 'districts.town_id')
                ->join('departments', 'departments.id', '=', 'towns.department_id')
                ->where('departments.name', $department->name)
                ->get();
        });

        return response()
            ->json([
                'department' => $department->name,
                'neighborhoods' => $neighborhoods,
            ])
            ->header('Cache-Control', 'public, max-age=' . $cacheTTL)
            ->setEtag(md5($cacheKey));
    }
}
