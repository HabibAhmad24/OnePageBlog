<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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



// Route::get('/index',[PostController::class,'index']);

Route::get('/',[PostController::class,'show']);
Route::post('/home/save',[PostController::class,'save']);
    // return view('home'););

Route::get('/dashboard', [PostController::class,'index']
)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/create', [PostController::class,'create']
)->middleware(['auth', 'verified']);
Route::post('/dashboard/store', [PostController::class,'store']
)->middleware(['auth', 'verified']);
Route::get('/dashboard/{id}/edit', [PostController::class,'edit']
)->middleware(['auth', 'verified']);
Route::put('/dashboard/{id}/update', [PostController::class,'update']
)->middleware(['auth', 'verified']);
Route::get('/dashboard/{id}/delete', [PostController::class,'destory']
)->middleware(['auth', 'verified']);
Route::get('/home', [PostController::class,'show']
)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
