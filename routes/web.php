<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController; 
use App\Http\Controllers\FasilitasKamarController;
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

Route::get('/fasilitashotel', function () {
    return view('admin/fasilitashotel');
})->name('fasilitashotel');

Route::get('/tambahfasilitashotel', function () {
    return view('admin/tambahfasilitashotel');
})->name('tambahfasilitashotel');

Route::get('/reservasi', function () {
    return view('admin/reservasi');
})->name('reservasi');

//Route::get('/dashboard', 'SiswaController@index');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('verified');
//Route::get('/reservasi', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('kamar', KamarController::class);


Route::resource('fasilitaskamar', FasilitasKamarController::class);
// Route::get('/tambahfasilitaskamar', [App\Http\Controllers\FasilitasKamarController::class, 'tambahfasilitaskamar'])->name('tambahfasilitaskamar');
// Route::get('/editfasilitaskamar/{fasilitaskamar}', [App\Http\Controllers\FasilitasKamarController::class, 'editfasilitaskamar'])->name('editfasilitaskamar');