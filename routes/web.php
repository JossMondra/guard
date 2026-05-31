<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // 👈 Importación agregada correctamente

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\BajaNinioController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NinioController;
use App\Http\Controllers\ParentezcoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RegistroComidaController;
use App\Http\Controllers\RegistroCuentaController;

// 🟢 Pantalla de bienvenida pública
Route::get('/', function () {
    return view('welcome');
});

// 🎯 Rutas de Autenticación tradicionales (Bootstrap)
Auth::routes();

// 🔒 LA REJA PRINCIPAL: Todo lo que esté aquí adentro requiere inicio de sesión
Route::middleware('auth')->group(function () {
    
    // Panel Principal (/home)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // 🪄 EL TRUCO: Si alguna vista vieja de Tailwind busca 'dashboard', lo mandamos a 'home' sin que truene
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Tus CRUDs de la Guardería (Irás metiendo los demás aquí adentro)
    Route::resource('abonos', AbonoController::class);
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
