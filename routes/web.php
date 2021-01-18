<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AboutController;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/{document}', [DashboardController::class, 'edit'])->name('dashboard.document');
Route::delete('/dashboard/{document}', [DashboardController::class, 'destroy'])->name('dashboard.document');

Route::get('/new_document', [DocumentController::class, 'index'])->name('document');
Route::post('/new_document', [DocumentController::class, 'store']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::post('/document/{document}/downloads', [DownloadController::class, 'store'])->name('document.download');
Route::post('/document/{document}/readings', [DownloadController::class, 'preview'])->name('document.read');

