<?php

namespace App\Http\Controllers\API\V1\Towns;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\JsonResponse;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cacheTTL = 3600;
        $cacheKey = 'towns';

        $towns = cache()->remember($cacheKey, $cacheTTL, function () {
            return Town::select('id', 'name')->get();
        });

        return response()
            ->json($towns)
            ->header('Cache-Control', 'public, max-age=' . $cacheTTL)
            ->setEtag(md5($cacheKey));
    }
}
