<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\KasKarTarController;
use App\Http\Controllers\KasSosialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileKarTarController;
use App\Http\Controllers\landingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::get('/', [landingController::class, 'landing'])->name('landing');


// Route::get('/login', function () {
//     return view('auth.login ');
// });
Route::get('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/tambah', [App\Http\Controllers\ProfileKarTarController::class, 'store']);
Route::put('/dashboard/edit/{id}', [App\Http\Controllers\ProfileKarTarController::class, 'EditKarTar']);

//get data kas kartar
Route::get('/kas-kartar-rekap', [KasKarTarController::class, 'rekap']);
Route::get('/kas-kartar-pengeluaran', [KasKarTarController::class, 'keluar']);
Route::get('/kas-kartar-pemasukan', [KasKarTarController::class, 'masuk']);

//post data kas kartar
Route::post('kas-kartar/pemasukan/tambah', [KasKarTarController::class, 'storePemasukan'])->name('kaskartar.masuk');
Route::post('kas-kartar/pengeluaran/tambah', [KasKarTarController::class, 'storePengeluaran'])->name('kaskartar.masuk');

//edit data kas kartar
Route::put('kas-kartar-pemasukan/edit/{id}', [KasKarTarController::class, 'editPemasukan'])->name('kaskartar.editMasuk');
Route::put('kas-kartar-pengeluaran/edit/{id}', [KasKarTarController::class, 'editPengeluaran'])->name('kaskartar.editKeluar');

//delete kas kartar
Route::delete('/kas-kartar/delete/{id}', [KasKarTarController::class, 'destroy']);

Route::post('store-admin', [UserController::class, 'store'])->name('admin.store');

Route::get('/rekap/kartar', [KasKarTarController::class, 'cetak_pdf']);



//get data kas sosial
Route::get('/kas-sosial-rekap', [KasSosialController::class, 'rekap']);
Route::get('/kas-sosial-pengeluaran', [KasSosialController::class, 'keluar']);
Route::get('/kas-sosial-pemasukan', [KasSosialController::class, 'masuk']);

//post data kas sosial
Route::post('kas-sosial/pemasukan/tambah', [KasSosialController::class, 'storePemasukan'])->name('kassosial.masuk');
Route::post('kas-sosial/pengeluaran/tambah', [KasSosialController::class, 'storePengeluaran'])->name('kassosial.keluar');

//edit data kas sosial
Route::put('kas-sosial-pemasukan/edit/{id}', [KasSosialController::class, 'editPemasukan'])->name('kassosial.editMasuk');
Route::put('kas-sosial-pengeluaran/edit/{id}', [KasSosialController::class, 'editPengeluaran'])->name('kassosial.editKeluar');

//delete kas sosial
Route::delete('/kas-sosial/delete/{id}', [KasSosialController::class, 'destroy']);

Route::get('/rekap/sosial', [KasSosialController::class, 'cetak_pdf']);

//Admin
Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
Route::post('/store-admin', [UserController::class, 'store']);
Route::delete('/admin-destroy/{id}', [UserController::class, 'destroy']);

//Bendahara
Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.index');
Route::post('/store-bendahara', [BendaharaController::class, 'store']);
Route::delete('/bendahara-destroy/{id}', [BendaharaController::class, 'destroy']);

Auth::routes();


