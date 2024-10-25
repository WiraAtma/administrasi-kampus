<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\DosenAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticing'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');
Route::get('/mahasiswa-detail/{id}', [MahasiswaController::class, 'show'])->middleware('auth');
Route::get('/mahasiswa-create', [MahasiswaController::class, 'create'])->middleware('auth');
Route::post('/filter-mahasiswa', [MahasiswaController::class, 'store'])->middleware('auth');
Route::get('/mahasiswa-edit/{id}', [MahasiswaController::class, 'edit'])->middleware([DosenAccess::class]);
Route::put('/filter-mahasiswa/{id}', [MahasiswaController::class, 'update'])->middleware([DosenAccess::class]);
Route::get('/mahasiswa-delete/{id}', [MahasiswaController::class, 'delete'])->middleware([AdminAccess::class]);
Route::delete('/filter-delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->middleware([AdminAccess::class]);
Route::get('/mahasiswa-temporary', [MahasiswaController::class, 'mahasiswaDeleted'])->middleware([AdminAccess::class]);
Route::get('/filter-restore-mahasiswa/{id}', [MahasiswaController::class, 'restore'])->middleware([AdminAccess::class]);

Route::get('/prodi', [ProdiController::class, 'index'])->middleware('auth');
Route::get('/prodi-detail/{id}', [ProdiController::class, 'show'])->middleware('auth');
Route::get('/prodi-create', [ProdiController::class, 'create'])->middleware('auth');
Route::post('/filter-prodi', [ProdiController::class, 'store'])->middleware('auth');
Route::get('/prodi-edit/{id}', [ProdiController::class, 'edit'])->middleware([DosenAccess::class]);
Route::post('/filter-prodi/{id}', [ProdiController::class, 'update'])->middleware([DosenAccess::class]);
Route::get('/prodi-delete/{id}', [ProdiController::class, 'delete'])->middleware([AdminAccess::class]);
Route::delete('/filter-delete-prodi/{id}', [ProdiController::class, 'destroy'])->middleware(AdminAccess::class);
Route::get('/prodi-temporary', [ProdiController::class, 'prodiDeleted'])->middleware('auth');
Route::get('/filter-restore-prodi/{id}', [ProdiController::class, 'restore'])->middleware('auth');

Route::get('/fakultas', [FakultasController::class, 'index'])->middleware('auth');