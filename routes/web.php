<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//peliculas
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('informacion/{codigo}', [\App\Http\Controllers\InformacionController::class, 'index']) ->name('informacion.index');

//series
Route::get('/series', [\App\Http\Controllers\SeriesController::class, 'index'])->middleware(['auth', 'verified'])->name('series');
Route::get('informacionseries/{codigo}', [\App\Http\Controllers\InformacionSeriesController::class, 'index']) ->name('informacion.infoseries');

//generos películas
Route::resource('generos',\App\Http\Controllers\DashboardController::class)->names('generos');

//generos series
Route::resource('generosseries',\App\Http\Controllers\SeriesController::class)->names('generosseries');

//actores
Route::get('informacionactores/{codigo}', [\App\Http\Controllers\InformacionActoresController::class, 'index']) ->name('informacion.infoactores');

//proximas peliculas 
Route::get('/proximaspeliculas', [\App\Http\Controllers\ProximasPeliculasController::class, 'index'])->middleware(['auth', 'verified'])->name('proximaspeliculas');

//buscador peliculas 
Route::get('/buscadorpeliculas', [\App\Http\Controllers\BuscadorPeliculasController::class, 'index'])->middleware(['auth', 'verified'])->name('buscadorpeliculas');

//buscador series 
Route::get('/buscadorseries', [\App\Http\Controllers\BuscadorSeriesController::class, 'index'])->middleware(['auth', 'verified'])->name('buscadorseries');

//comentario
Route::get('comentario', [\App\Http\Controllers\ComentarioController::class, 'store']) ->middleware(['auth'])->name('comentario.store');

//valoracion 
Route::get('valoracion', [\App\Http\Controllers\ValoracionController::class, 'store']) ->middleware(['auth'])->name('valoracion.store');


Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





