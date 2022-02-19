<?php
namespace App\Http\Controllers;

use App\Models\AuditoriaInventario;
use App\Models\GestionInventario;
use App\Models\Inventario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('locales', [LocaleController::class, 'index'])->name('locales');
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::get('productos', [ProductoController::class, 'index'])->name('productos');
Route::get('gestiones', [GestionInventarioController::class, 'index'])->name('gestiones');
Route::get('auditorias', [AuditoriaInventarioController::class, 'index'])->name('auditorias');
Route::get('inventario_completo', [InventarioController::class, 'index'])->name('inventario_completo');
Route::get('ventas_restaurante', [InventarioController::class, 'index'])->name('ventas_restaurante');