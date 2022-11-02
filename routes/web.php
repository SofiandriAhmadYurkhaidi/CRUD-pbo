<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;

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
    return view('Layout');
});

Route::get('berita',[BeritaController::class,'index']);
Route::post('berita/tambah',[BeritaController::class,'tambah']);
Route::post('/berita/update/{id}', [BeritaController::class,'update'])->name('berita.update');
Route::get('/berita/delete/{id}', [BeritaController::class,'delete'])->name('berita.delete');



Route::get('kontak',[KontakController::class,'index']);
Route::post('kontak/tambah',[KontakController::class,'tambah']);
Route::post('/kontak/update/{id}', [KontakController::class,'update'])->name('kontak.update');
Route::get('/kontak/delete/{id}', [KontakController::class,'delete'])->name('kontak.delete');


Route::get('profile',[ProfileController::class,'index']);
Route::post('profile/tambah',[ProfileController::class,'tambah']);
Route::post('/profile/update/{id}', [ProfileController::class,'update'])->name('profile.update');
Route::get('/profile/delete/{id}', [ProfileController::class,'delete'])->name('profile.delete');



