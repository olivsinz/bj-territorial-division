<?php

namespace App\Http\Controllers\API\V1\Districts;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Neighborhood;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistrictNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(District $district): JsonResponse
    {
        return response()->json([
            'district' => $district->name,
            'neighborhoods' => $district->neighborhoods,
        ]);
    }
}
