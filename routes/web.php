<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [UploadController::class, 'index'])->name('upload');
Route::post('/', [UploadController::class, 'save']);

//Route::get('/', [ClientController::class, 'index'])->name('index');
//Route::get('/', [ClientController::class, 'create'])->name('create');
//Route::post('/', [ClientController::class, 'store']);
Route::put('/', [ClientController::class, 'edit'])->name('edit');
Route::delete('/', [ClientController::class, 'destroy'])->name('destroy');