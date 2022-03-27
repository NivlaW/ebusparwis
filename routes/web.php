<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ebusController;
use App\Http\Controllers\pesanController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\clientController;

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

Route::get('/', ebusController::class . '@client');
Route::get('admin',[authController::class,'formlogin']);
Route::get('dashboard',[authController::class,'formlogin'])->name('login');
Route::post('admin',[authController::class,'login']);
Route::post('dashboard',[authController::class,'login']);
Route::get('tipe/{id_jenis}',[ebusController::class,'tipekamar']);
Route::get('kamar',[pesanController::class,'detail']);
Route::post('kamar/reserve',[pesanController::class,'pesan']);
Route::get('kamar/{uuid}/reserve/kwitansi',[pesanController::class,'kwitansi']);
Route::middleware('auth')->group(function(){
    Route::get('/admin/logout',[authController::class,'logout']);
    Route::resource('/admin/dashboard',ebusController::class);
    Route::resource('/admin/list-tipe',jenisController::class);
    Route::get('/admin/list-tipe/edit/{jenis}',[jenisController::class,'edit']);
    Route::get('/admin/edit/{ebus}',[ebusController::class,'edit']);
    Route::post('/resepsionis/client',[clientController::class,'status']);
    Route::get('/resepsionis/client',[clientController::class,'index']);
});