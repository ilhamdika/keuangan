<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
