<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Towns;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\JsonResponse;

class TownNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Town $town): JsonResponse
    {
        return response()
            ->json([
                'town' => $town->name,
                'neighborhoods' => $town->neighborhoods,
            ])
            ->header('Cache-Control', 'public, max-age=3600')
            ->setEtag(md5($town->name));
    }
}
