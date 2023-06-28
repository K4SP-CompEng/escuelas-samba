<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EscuelaController;
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
//Route::view('/escuelas', 'escuela.escuela')->name('escuela');

Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('buscar_colaborador');
Route::get('/colaboradores/crear', [ColaboradorController::class, 'create'])->name('crear_colaborador');
Route::post('/colaboradores/introducido', [ColaboradorController::class, 'store'])->name('colaborador_creado');
Route::get('/colaboradores/ver/{id}', [ColaboradorController::class, 'show'])->name('mostrar_colaborador');
Route::get('/colaboradores/editar/{id}', [ColaboradorController::class, 'edit'])->name('editar_colaborador');
Route::put('/colaboradores/actualizar/{id}', [ColaboradorController::class, 'update'])->name('colaborador_actualizado');
Route::delete('/colaboradores/destroy/{id}', [ColaboradorController::class, 'destroy'])->name('colaborador_eliminado');

Route::get('/escuelas', [EscuelaController::class, 'index'])->name('buscar_escuela');
Route::get('/escuelas/crear', [EscuelaController::class, 'create'])->name('crear_escuela');
Route::post('/escuelas/introducido', [EscuelaController::class, 'store'])->name('escuela_creada');
Route::get('/escuelas/ver/{id}', [EscuelaController::class, 'show'])->name('mostrar_escuela');
Route::get('/escuelas/editar/{id}', [EscuelaController::class, 'edit'])->name('editar_escuela');
Route::put('/escuelas/actualizar/{id}', [EscuelaController::class, 'update'])->name('escuela_actualizada');
Route::delete('/escuelas/destroy/{id}', [EscuelaController::class, 'destroy'])->name('escuela_eliminada');

