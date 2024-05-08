<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\DepartmentController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([], function () {
    
// });

Route::controller(DepartmentController::class)
        ->name('departments.')
        ->prefix('/departments')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/orders', 'store');
        });
