<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('/productos',[ProductoController::class,'index'])->name('index');
route::post('/store',[ProductoController::class,'store'])->name('store');
route::delete('/delete/{producto}',[ProductoController::class,'destroy'])->name('destroy');
route::get('/venta/{producto}',[ProductoController::class,'vender'])->name('venta');
route::put('/ventaRealizada/{producto}',[ProductoController::class,'vendido'])->name('vendido');
route::get('/ventaFecha',[ProductoController::class,'ventaFecha'])->name('vent');
