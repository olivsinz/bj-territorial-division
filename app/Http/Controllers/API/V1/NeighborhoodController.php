<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNeighborhoodRequest;
use App\Http\Requests\UpdateNeighborhoodRequest;
use App\Models\Neighborhood;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $neighborhoods = Neighborhood::all();

        return response()->json($neighborhoods);
    }

    /**
     * Display the specified resource.
     */
    public function show(Neighborhood $neighborhood)
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
