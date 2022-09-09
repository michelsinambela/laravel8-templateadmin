<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployessController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', [HomeController::class, 'index'])->name('about');

//ini adalah class tampilan data pegawai
Route::get('/pegawai', [EmployessController::class, 'index'])->name('pegawai');

//ini adalah class tambah data pegawai 
Route::get('/tambahpegawai', [EmployessController::class, 'tambahpegawai'])->name('tambahpegawai');

//ini adalah class menambahkan database
Route::post('/insertdata', [EmployessController::class, 'insertdata'])->name('insertdata');

// ini adalah class untuk update data
Route::get('/tampilkandata/{id}', [EmployessController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployessController::class, 'updatedata'])->name('updatedata');

// ini adalah hapus data
Route::get('/delete/{id}', [EmployessController::class, 'delete'])->name('delete');

// ini adalah eksport pdf 
Route::get('/exportpdf', [EmployessController::class, 'exportpdf'])->name('exportpdf');

// ini adalah eksport pdf 
Route::get('/exportexcel', [EmployessController::class, 'exportexcel'])->name('exportexcel');

Route::get('/blog', function () {
    return view('posts');
});