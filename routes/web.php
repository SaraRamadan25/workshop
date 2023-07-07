<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
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
Route::get('articles',[ArticleController::class,'index'])->name('articles.index');
Route::get('articles/create',[ArticleController::class,'create'])->name('articles.create');
Route::post('articles',[ArticleController::class,'store'])->name('articles.store');
Route::get('articles/{article}',[ArticleController::class,'show'])->name('articles.show');
Route::get('articles/{article}/edit',[ArticleController::class,'edit'])->name('articles.edit');
Route::patch('articles/{article}',[ArticleController::class,'update'])->name('articles.update');
Route::delete('articles/{article}',[ArticleController::class,'destroy'])->name('articles.destroy');
