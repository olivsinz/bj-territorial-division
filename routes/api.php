<?php

use App\Http\Controllers\API\V1\DepartmentController;
use App\Http\Controllers\API\V1\DepartmentDistrictController;
use App\Http\Controllers\API\V1\DepartmentNeighborhoodController;
use App\Http\Controllers\API\V1\DepartmentTownController;
use App\Http\Controllers\API\V1\Districts\DistrictController;
use App\Http\Controllers\API\V1\Districts\DistrictNeighborhoodController;
use App\Http\Controllers\API\V1\NeighborhoodController;
use App\Http\Controllers\API\V1\TownController;
use App\Http\Controllers\API\V1\TownDistrictController;
use App\Http\Controllers\API\V1\TownNeighborhoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['throttle:api'])->prefix('v1')->group(function () {
    Route::prefix('departments')
        ->group(function () {
            Route::controller(DepartmentController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });

            Route::controller(DepartmentTownController::class)->group(function () {
                Route::get('/{department}/towns', 'index');
            });

            Route::controller(DepartmentDistrictController::class)->group(function () {
                Route::get('/{department}/districts', 'index');
            });

            Route::controller(DepartmentNeighborhoodController::class)->group(function () {
                Route::get('/{department}/neighborhoods', 'index');
            });
        });

    Route::prefix('/towns')
        ->group(function () {
            Route::get('/', [TownController::class, 'index']);

            Route::controller(TownDistrictController::class)->group(function () {
                Route::get('/{town}/districts', 'index');
            });

            Route::controller(TownNeighborhoodController::class)->group(function () {
                Route::get('/{town}/neighborhoods', 'index');
            });
        });

    Route::prefix('/districts')
        ->group(function () {
            Route::get('/', [DistrictController::class, 'index']);

            Route::controller(DistrictNeighborhoodController::class)->group(function () {
                Route::get('/{district}/neighborhoods', 'index');
            });
        });

    Route::get('/neighborhoods', [NeighborhoodController::class, 'index']);
});
