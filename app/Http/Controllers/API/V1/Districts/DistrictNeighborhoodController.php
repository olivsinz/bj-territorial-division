<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Districts;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\JsonResponse;

class DistrictNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(District $district): JsonResponse
    {
        return response()
            ->json([
                'district' => $district->name,
                'neighborhoods' => $district->neighborhoods,
            ])
            ->header('Cache-Control', 'public, max-age=3600')
            ->setEtag(md5($district->name));
    }
}
