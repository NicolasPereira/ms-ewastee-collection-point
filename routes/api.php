<?php

use App\Http\Controllers\CollectionPointController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/collection-point', [CollectionPointController::class, 'create']);

Route::get('/collection-points', [CollectionPointController::class, 'index']);
Route::get('/collection-point/{collectionPoint}', [CollectionPointController::class, 'show']);
Route::put('/collection-point/{collectionPoint}', [CollectionPointController::class, 'update']);
Route::post('/collection-points/params', [CollectionPointController::class, 'findByAttribute']);
Route::get('/collection-points/owner/{id}', [CollectionPointController::class, 'findByOwnerId']);
