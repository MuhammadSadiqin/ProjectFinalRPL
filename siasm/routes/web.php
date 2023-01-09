<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanAsuransiController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('only_guest')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'authenticating']);
    Route::get('register',[AuthController::class,'register']);
    Route::post('register',[AuthController::class,'registerProcess']);
});
    

Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('dashboard',[DashboardController::class,'index'])->middleware(['auth','only_admin']);
    Route::get('profile',[UserController::class,'profile']);
    Route::get('mahasiswa',[UserController::class,'mahasiswa']);
    Route::get('pengajuan',[PengajuanAsuransiController::class,'indexin']);
    Route::get('pengajuan/download/{file}',[PengajuanAsuransiController::class,'download']);
    Route::post('pengajuan/store',[PengajuanAsuransiController::class,'store']);
    Route::post('pengajuan/ditolak',[PengajuanAsuransiController::class,'ditolak']);
    Route::post('pengajuan/diterima',[PengajuanAsuransiController::class,'diterima']);
    Route::post('pengajuan/edit',[PengajuanAsuransiController::class,'edit']);
    Route::post('pengajuan/delete',[PengajuanAsuransiController::class,'delete']);
    
    
});
