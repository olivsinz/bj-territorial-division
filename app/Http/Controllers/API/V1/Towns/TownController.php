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
        $towns = cache()->remember('departments', now()->addMonths(6), function () {
            return Town::all();
        });

        return response()->json($towns);
    }
}
