<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\clientes\ClientesController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logOut']);
Route::post('/infouser', [AuthController::class, 'infouser'])->middleware('auth:sanctum');
Route::get('/clientes/show', [ClientesController::class,'showApi']);
Route::post('/clientes/create', [ClientesController::class,'storeApi']);
Route::put('/clientes/edit/{id}', [ClientesController::class,'editApi']);
Route::post('/clientes/delete/{id}', [ClientesController::class,'destroyApi']);

