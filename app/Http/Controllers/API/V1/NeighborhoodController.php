<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use App\Services\NeighborhoodService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, NeighborhoodService $neighborhoodService): JsonResponse
    {
        $pageSize = $request->integer('page_size', 20);
        $page = $request->integer('page', 1);

        $cacheTTL = 3600;
        $cacheKey = $neighborhoodService->cacheKey($pageSize, $page);

        $neighborhoods = cache()->remember($cacheKey, $cacheTTL, function () use ($pageSize, $page) {
            return Neighborhood::paginate(
                $pageSize,
                ['*'],
                'page',
                $page
            );
        });

        return response()
            ->json($neighborhoods)
            ->header('Cache-Control', 'public, max-age=' . $cacheTTL)
            ->setEtag(md5($cacheKey));
    }
}
