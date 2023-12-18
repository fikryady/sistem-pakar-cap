<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDiseaseController;
use App\Http\Controllers\DashboardHistoryController;
use App\Http\Controllers\DashboardRuleController;
use App\Http\Controllers\DashboardSymptomController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/diseases', [DiseaseController::class, 'index']);
Route::get('/diseases/{disease:slug}', [DiseaseController::class, 'show']);

Route::get('/symptoms', [SymptomController::class, 'index']);
Route::get('/symptoms/{symptom:slug}', [SymptomController::class, 'show']);

Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('consultation.index');
Route::get('/konsultasi/gejala', [KonsultasiController::class, 'gejala'])->name('consultation.gejala');
Route::post('/konsultasi/gejala', [KonsultasiController::class, 'proses'])->name('consultation.proses');
Route::get('/konsultasi/result/{id}', [KonsultasiController::class, 'result'])->name('consultation.result');
Route::get('/konsultasi/cetak/{id}', [KonsultasiController::class, 'cetak'])->name('consultation.cetak');
Route::get('/konsultasi/cetak/{id}/{time}', [KonsultasiController::class, 'pdf'])->name('consultation.pdf');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/profile', [UserController::class, 'index']);
// Route::put('/profile/edit', [UserController::class, 'edit']);
Route::resource('/profile', UserController::class)->middleware('auth');


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/dashboard/diseases/checkSlug', [DashboardDiseaseController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/diseases', DashboardDiseaseController::class)->middleware('admin');

Route::get('/dashboard/symptoms/checkSlug', [DashboardDiseaseController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/symptoms', DashboardSymptomController::class)->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::resource('/dashboard/rules', DashboardRuleController::class)->middleware('admin');

Route::resource('/dashboard/histories', DashboardHistoryController::class)->middleware('admin');
