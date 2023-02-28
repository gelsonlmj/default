<?php

use App\Http\Controllers\Api\ClientController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'list']);
    Route::post('/create', [ClientController::class, 'create']);
    Route::get('/searchByFilters', [ClientController::class, 'searchByFilters']);
    Route::delete('/delete/{id}', [ClientController::class, 'delete']);
});
