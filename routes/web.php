<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
//rotoa de welcome
Route::get('/', function () {
    return view('welcome');
});
//rota de inicio 
Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');


//rota de tarefas
 Route::resource('padaria', SiteController::class)->middleware(['auth', 'verified']);

 //rota de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

