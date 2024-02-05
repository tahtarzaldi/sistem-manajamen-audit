<?php

use App\Http\Controllers\ProfileController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/audit', 'App\Http\Controllers\PerencanaanAuditController@index')->middleware(['auth', 'verified'])->name('home');
Route::get('/audit/tambah','App\Http\Controllers\PerencanaanAuditController@create')->middleware(['auth', 'verified'])->name('tambah');
Route::get('/audit/detail/{id}','App\Http\Controllers\PerencanaanAuditController@detail')->middleware(['auth', 'verified'])->name('detail');
Route::post('/audit/store','App\Http\Controllers\PerencanaanAuditController@store')->middleware(['auth', 'verified'])->name('tambah2');
Route::get('/audit/edit/{id}','App\Http\Controllers\PerencanaanAuditController@edit')->middleware(['auth', 'verified'])->name('edit');
Route::post('/audit/update','App\Http\Controllers\PerencanaanAuditController@update')->middleware(['auth', 'verified'])->name('edit2');
Route::get('/audit/hapus/{id}','App\Http\Controllers\PerencanaanAuditController@destroy')->middleware(['auth', 'verified'])->name('hapus');

Route::get('/pelaksanaan', 'App\Http\Controllers\PelaksanaanAuditController@index')->middleware(['auth', 'verified'])->name('home');
Route::get('/pelaksanaan/tambah','App\Http\Controllers\PelaksanaanAuditController@create')->middleware(['auth', 'verified'])->name('tambah');
Route::post('/pelaksanaan/store','App\Http\Controllers\PelaksanaanAuditController@store')->middleware(['auth', 'verified'])->name('tambah2');
Route::get('/pelaksanaan/edit/{id}','App\Http\Controllers\PelaksanaanAuditController@edit')->middleware(['auth', 'verified'])->name('edit');
Route::post('/pelaksanaan/update','App\Http\Controllers\PelaksanaanAuditController@update')->middleware(['auth', 'verified'])->name('edit2');
Route::get('/pelaksanaan/hapus/{id}','App\Http\Controllers\PelaksanaanAuditController@destroy')->middleware(['auth', 'verified'])->name('hapus');

require __DIR__.'/auth.php';
