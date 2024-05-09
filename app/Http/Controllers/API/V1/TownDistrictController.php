<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\Request;

class TownDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Town $town)
    {
        return response()->json([
            'town' => $town->name,
            'districts' => $town->districts,
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
    public function show(Town $town)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Town $town)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Town $town)
    {
        //
    }
}
