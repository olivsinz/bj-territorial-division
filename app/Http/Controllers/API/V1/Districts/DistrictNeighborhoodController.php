<?php

namespace App\Http\Controllers\API\V1\Districts;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class DistrictNeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(District $district)
    {
        return response()->json([
            'district' => $district->name,
            'neighborhoods' => $district->neighborhoods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Neighborhood $neighborhood)
    {
        //
    }
}
