<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompraController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'all'])->name('home');


Route::get('/category/{id?}', [ProductController::class, 'category']);
Route::post('/search', [ProductController::class, 'search'])->name('search-product');

Route::get('/compra', [CompraController::class, 'main'])->name('compra-init');
Route::get('/compra/resumen', [CompraController::class, 'resumen']);
Route::get('/compra/envio', [CompraController::class, 'envio']);
Route::post('/compra/envio', [CompraController::class, 'verificarEnvio']);
Route::get('/compra/confirmar', [CompraController::class, 'confirmar']);
Route::get('/compra/end', [CompraController::class, 'end']);
Route::post('stock', [CompraController::class, 'checkStock']);

Route::post('addToCart')->name('addToCart');
Route::get('clearCart')->name('clearCart');
