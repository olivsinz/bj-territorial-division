<?php

namespace App\Http\Controllers\API\V1\Towns;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TownNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Town $town): JsonResponse
    {
        return response()->json([
            'town' => $town->name,
            'neighborhoods' => $town->neighborhoods,
        ]);
    }
}
