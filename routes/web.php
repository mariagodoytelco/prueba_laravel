<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/tareas', [TareasController::class, 'index'])->name('tareas');

Route::post('/tareas', [TareasController::class, 'store']);

Route::get('/tareas/{id}', [TareasController::class, 'show'])->name('tareas-show');

Route::patch('/tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');

Route::delete('/tareas/{id}', [TareasController::class, 'destroy'])->name('tareas-destroy');

Route::resource('categorias', CategoriasController::class);