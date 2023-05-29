<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ComentariosController;
use App\Http\Controllers\Admin\UsuariosController;

Route::get('', [HomeController::class,'index'])->name('admin.index');


Route::get('comentarios', [ComentariosController::class, 'index'])->name('admin.comentarios.index');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('admin.usuarios.index');


Route::delete('comentarios/{comentario}', [ComentariosController::class, 'destroy'])->name('admin.comentarios.destroy');

Route::delete('usuarios/{usuario}', [UsuariosController::class, 'destroy'])->name('admin.usuarios.destroy');