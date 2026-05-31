<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\BajaNinioController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NinioController;
use App\Http\Controllers\ParentezcoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RegistroComidaController;
use App\Http\Controllers\RegistroCuentaController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/personas', PersonaController::class);
});