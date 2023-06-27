<?php

use App\Http\Controllers\ColaboradorController;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('index');
Route::view('/escuelas', 'escuela')->name('escuela');

Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('buscar_colaborador');
Route::get('/colaboradores/crear', [ColaboradorController::class, 'create'])->name('crear_colaborador');
Route::post('/colaboradores/introducido', [ColaboradorController::class, 'store'])->name('colaborador_creado');
Route::get('/colaboradores/ver/{id}', [ColaboradorController::class, 'show'])->name('mostrar_colaborador');
Route::get('/colaboradores/editar/{id}', [ColaboradorController::class, 'edit'])->name('editar_colaborador');
Route::put('/colaboradores/actualizar/{id}', [ColaboradorController::class, 'update'])->name('colaborador_actualizado');
Route::delete('/note/destroy/{id}', [ColaboradorController::class, 'destroy'])->name('colaborador_eliminado');

