<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $neighborhoods = Neighborhood::paginate(
            $request->integer('page_size', 20), 
            ['*'], 
            'page', 
            $request->integer('page', 1)
        );

        return response()->json($neighborhoods);
    }
}
