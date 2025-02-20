<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

//inicio/cadstro
Route::get('/',  [UsuarioController::class, 'CadasroUsuario']);

//rota dos dados de cadastramento
Route::post('salva', [UsuarioController::class, 'SalvarUsuario'])->name('salva');

//rota de login
Route::get('login', function(){
    return view('/site/LoginUsuario');
})->name('log');

//rota dos dados de login
Route::post('logar', [UsuarioController::class, 'LoginUsuario'])->name('logar');

//rota do serviço principal
Route::get('trabalho', function () {
    return view('/site/Trabalho');
})->name('trabalho');

Route::get('novotrabalho',[SiteController::class,'index'])->name('novotrabalho');