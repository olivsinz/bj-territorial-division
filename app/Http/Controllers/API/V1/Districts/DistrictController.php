<?php

namespace App\Http\Controllers\API\V1\Districts;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $districts = cache()->remember('districts', now()->addMonths(6), function () {
            return District::all();
        });

        return response()->json($districts);
    }
}
