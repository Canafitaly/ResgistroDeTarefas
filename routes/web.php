<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [UsuarioController::class, 'CadasroUsuario']);
Route::post('salva', [UsuarioController::class, 'SalvarUsuario'])->name('salva');
Route::get('login', [UsuarioController::class, 'LoginUsuario'])->name('log');
Route::get('site/Trabalho', function () {
    return view('site/Trabalho');
})->name('trabalho');