<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\DepartmentController;
use App\Http\Controllers\API\V1\DepartmentDistrictController;
use App\Http\Controllers\API\V1\DepartmentNeighborhoodController;
use App\Http\Controllers\API\V1\DepartmentTownController;
use App\Http\Controllers\API\V1\DistrictController;
use App\Http\Controllers\API\V1\NeighborhoodController;
use App\Http\Controllers\API\V1\TownController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('departments')
        ->name('departments.')
        ->group(function () {
            Route::controller(DepartmentController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });

            Route::controller(DepartmentTownController::class)->group(function () {
                Route::get('/{department}/towns', 'index')->name('findTowns');
            });

            Route::controller(DepartmentDistrictController::class)->group(function () {
                Route::get('/{department}/districts', 'index')->name('findDistricts');
            });

            Route::controller(DepartmentNeighborhoodController::class)->group(function () {
                Route::get('/{department}/neighborhoods', 'index')->name('findNeighborhoods');
            });
        });

    Route::controller(DistrictController::class)
        ->name('districts.')
        ->prefix('/districts')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::controller(TownController::class)
        ->name('towns.')
        ->prefix('/towns')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::controller(NeighborhoodController::class)
        ->name('neighborhoods.')
        ->prefix('/neighborhoods')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });
});