<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NeighborhoodCollection;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): NeighborhoodCollection
    {
        // $neighborhoods = Neighborhood::paginate(
        //     $request->integer('page_size', 20),
        //     ['*'],
        //     'page',
        //     $request->integer('page', 1)
        // );

        $pageSize = $request->integer('page_size', 20);
        $page = $request->integer('page', 1);

        return cache()->remember('neighborhoods.page-size-' . $pageSize . '.page-' . $page, 100, function () use ($pageSize, $page) {
            return new NeighborhoodCollection(Neighborhood::paginate(
                $pageSize,
                ['*'],
                'page',
                $page
            ));
        });

        // return response()->json($neighborhoods);
    }
}
