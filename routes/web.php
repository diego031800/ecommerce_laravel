<?php

use App\Http\Controllers\CarritoDetailController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('', FrontController::class)->name('home');
Route::get('productos/{producto}', [FrontController::class, 'show'])->name('user.productos.show');

Route::post('carrito_details/{producto}/store', [CarritoDetailController::class, 'store'])->name('carrito_details.store')->middleware('auth');
Route::get('add_producto_carrito/{producto}/store', [CarritoDetailController::class,'storeproducto'])->name('carrito_productos.store')->middleware('auth');

Route::get('carrito/detalle', [CarritoDetailController::class, 'detalles'])->name('carrito.detalles')->middleware('auth');
Route::get('delete/{producto_id}/{id}',[CarritoDetailController::class,'destroy'])->name('carrito_producto.destroy')->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'autentificacion'])->name('autentificacion');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('registrar', [FrontController::class, 'registrar'])->name('registrar');
Route::post('resgitrar', [FrontController::class, 'store'])->name('registrar.store');

Route::get('pedido/{carrito}', [FrontController::class, 'createPedido'])->name('pedido')->middleware('auth')->middleware('auth');

Route::get('reporte/{id}', [FrontController::class, 'generarReporte'])->name('reporte.pedido');
Route::get('verPedidos/{user}', [FrontController::class,'verpedidos'])->name('verpedidos');
