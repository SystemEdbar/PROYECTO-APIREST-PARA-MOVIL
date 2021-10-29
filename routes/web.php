<?php

use App\Http\Controllers\clientes\ClientesController;
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

Route::get('/', function () {return view('welcome');});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('dashboard');})->name('dashboard');

//Clientes
Route::get('clientes', [ClientesController::class,'index'])->name('clientes');
Route::get('clientes/crear', [ClientesController::class,'create'])->name('clientes.crear');
Route::post('clientes/guardar', [ClientesController::class,'guardado'])->name('clientes.guardar');
Route::get('clientes/crear', [ClientesController::class,'create'])->name('clientes.crear');
Route::get('clientes/editar/{id}', [ClientesController::class,'edit'])->name('clientes.editar');
Route::post('clientes/actualizar/{id}', [ClientesController::class,'update'])->name('clientes.actualizar');
Route::get('clientes/eliminar/{id}', [ClientesController::class,'destroy'])->name('clientes.eliminar');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
