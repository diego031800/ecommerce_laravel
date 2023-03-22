<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', HomeController::class)->name('home.admin')->middleware('can:home.admin');

Route::resource('productos', ProductoController::class)->except('show')->middleware('auth');
Route::get('producto/cancelar', function () {
    return redirect()->route('productos.index')->with('datos', 'Acción Cancelada')->with('estilo', 'warning');
})->name('productos.cancelar')->middleware('auth');

Route::resource('proveedores', ProveedoreController::class)->except('show')->middleware('auth');
Route::get('proveedor/cancelar', function () {
    return redirect()->route('proveedores.index')->with('datos', 'Acción Cancelada')->with('estilo', 'warning');
})->name('proveedores.cancelar')->middleware('auth');

Route::resource('pedidos', PedidoController::class)->except('show')->middleware('auth');
Route::get('pedido/cancelar', function () {
    return redirect()->route('pedidos.index')->with('datos', 'Acción Cancelada')->with('estilo', 'warning');
})->name('pedidos.cancelar')->middleware('auth');

Route::resource('users', UserController::class)->except(['show','destroy','create','store'])->middleware('auth');
Route::get('user/cancelar', function () {
    return redirect()->route('users.index')->with('datos', 'Acción Cancelada')->with('estilo', 'warning');
})->name('users.cancelar')->middleware('auth');

Route::resource('categorias', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update'])->parameters(['categorias' => 'category'])->middleware('auth');

Route::get('graficos/pedidos', [GraficoController::class, 'pedidos'])->name('graficos.pedidos')->middleware('auth');
Route::get('graficos/productos', [GraficoController::class, 'productos'])->name('graficos.productos')->middleware('auth');

Route::get('reportes/pedidos', [PedidoController::class, 'reportes'])->name('reportes.index')->middleware('auth');