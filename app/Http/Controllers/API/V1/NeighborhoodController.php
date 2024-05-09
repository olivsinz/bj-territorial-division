<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('page_size', 20);

        $neighborhoods = Neighborhood::paginate($pageSize, ['*'], 'page', $page);

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
