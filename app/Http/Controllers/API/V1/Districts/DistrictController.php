<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Districts;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cacheTTL = 3600;
        $cacheKey = 'districts';

        $districts = Cache::remember($cacheKey, $cacheTTL, function () {
            return District::select('id', 'name')->get();
        });

        return response()
            ->json($districts)
            ->header('Cache-Control', 'public, max-age=' . $cacheTTL)
            ->setEtag(md5($cacheKey));
    }
}
