<?php

namespace App\Http\Controllers\API\V1\Towns;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\JsonResponse;

class TownDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Town $town): JsonResponse
    {
        return response()->json([
            'town' => $town->name,
            'districts' => $town->districts,
        ]);
    }
}
